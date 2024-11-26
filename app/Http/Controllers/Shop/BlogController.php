<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use Image;

class BlogController extends Controller
{
    //
     //
     public function index(){
        return view('Shop.Blog.index');
    }
    // Insert Data
    public function save(Request $req){
        $store=New Blog();
        $store->blog_header=$req->header;
        $store->blog_date=$req->date;
        $store->user=$req->user;
        $store->blog_posted = Auth::check() ? Auth::user()->name . ' ' . (Auth::user()->last_name ?? '') : 'Guest User';
        $store->blog_short_description=$req->short_description;
        $store->blog_main_description=$req->long_description;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/blog/' . $image_ext);
            $store->blog_main_image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Blog Added Successfully',
                'alert-type' => 'success'
            );
        }
        else{
            $notification = array(
                'message' => 'Failed To Add!!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    // Table
    public function table(){
        $blog=Blog::where('user', Auth::user()->name)->get();
        return view('Shop.Blog.table',compact('blog'));
    }
    // Update Stautsu
    public function blogUpdateStatus(Request $request, $id)
    {
    
        $data = Blog::find($id);

 
        $data->blog_status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Load Edit
    public function edit($id){
        $data=Blog::find($id);
        return view('Shop.Blog.edit',compact('data'));
    }
    // Update
    public function update(Request $req){
        $store=Blog::find($req->c_id);
        $store->blog_header = $req->header ?? $store->blog_header;
        $store->blog_date = $req->date ?? $store->blog_date;
        $store->blog_posted = Auth::check() ? Auth::user()->name . ' ' . (Auth::user()->last_name ?? '') : 'Guest User';
        $store->blog_short_description = $req->short_description ?? $store->blog_short_description;
        $store->blog_main_description = $req->long_description ?? $store->blog_main_description;
        

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/blog/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/blog/' . $store->images)) {
                 unlink('storage/back/media/blog/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->blog_main_image = $image_ext;
             $store->save();
         }
         $store->save();
         if ($store) {
             $notification = array(
                 'message' => 'Blog Update Successfully',
                 'alert-type' => 'success'
             );
         } else {
             $notification = array(
                 'message' => 'Failed To update!!',
                 'alert-type' => 'error'
             );
         }
         return redirect()->route('shop.all.blog')->with($notification);  
    }
    // Delete
    public function del($id){
        $result = Blog::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->package_images) {
            $imagePath = 'storage/back/media/blog/' . $result->blog_main_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Package Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
