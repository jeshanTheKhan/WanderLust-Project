<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    //
    public function index(){
        return view('Admin.About.index');
    }
    // Insert Data
    public function save(Request $req){
        $store=New About();
        $store->name=$req->header;
        $store->position=$req->facebook;
        $store->hotel_name=$req->instagram;
        $store->description=$req->long_description;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/about/' . $image_ext);
            $store->image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'About Added Successfully',
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
    public function table(){
        $data=About::all();
        return view('Admin.About.table',compact('data'));
    }
    // Update Stautsu
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = About::find($id);

 
        $data->status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Edit
    public function edit($id){
        $data=About::find($id);
        return view('Admin.About.edit',compact('data'));
    }
    public function update(Request $req){
        $store=About::find($req->c_id);
        $store->name = $req->header ?? $store->name;
        $store->position = $req->facebook ?? $store->position;
        $store->hotel_name = $req->instagram ?? $store->hotel_name;
        $store->description = $req->long_description ?? $store->description;



        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/about/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/about/' . $store->images)) {
                 unlink('storage/back/media/about/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->image = $image_ext;
             $store->save();
         }
         $store->save();
         if ($store) {
             $notification = array(
                 'message' => 'About Update Successfully',
                 'alert-type' => 'success'
             );
         } else {
             $notification = array(
                 'message' => 'Failed To update!!',
                 'alert-type' => 'error'
             );
         }
         return redirect()->route('admin.all.about')->with($notification);  

    }
    // Delete
    public function del($id){
        $result = About::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->guide_image) {
            $imagePath = 'storage/back/media/about/' . $result->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'About Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
