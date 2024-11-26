<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Image;

class TestimonialController extends Controller
{
    //
    public function index(){
        return view('Admin.Testimonial.index');
    }
    // Insert Data
    public function save(Request $req){
        $store=New Testimonial();
        $store->client_name=$req->header;
        $store->client_comment=$req->description;
        $store->client_location=$req->location;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/testimonial/' . $image_ext);
            $store->client_image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Testimonial Added Successfully',
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
        $data=Testimonial::all();
        return view('Admin.Testimonial.table',compact('data'));
    }
    // Update Stautsu
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = Testimonial::find($id);

 
        $data->status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Load Edit Page
    public function edit($id){
        $data=Testimonial::find($id);
        return view('Admin.Testimonial.edit',compact('data'));
    }
    // Update
    // Update
    public function update(Request $req){
        $store=Testimonial::find($req->c_id);
        // Update or keep previous values
        $store->client_name = $req->header ?? $store->client_name;
        $store->client_comment = $req->description ?? $store->client_comment;
        $store->client_location = $req->location ?? $store->client_location;

        

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/testimonial/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/testimonial/' . $store->images)) {
                 unlink('storage/back/media/testimonial/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->client_image = $image_ext;
             $store->save();
         }
         $store->save();
         if ($store) {
             $notification = array(
                 'message' => 'Testimonial Update Successfully',
                 'alert-type' => 'success'
             );
         } else {
             $notification = array(
                 'message' => 'Failed To update!!',
                 'alert-type' => 'error'
             );
         }
         return redirect()->route('admin.all.testimonial')->with($notification);  
    }
    // Delete
    public function del($id){
        $result = Testimonial::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->package_images) {
            $imagePath = 'storage/back/media/testimonial/' . $result->client_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
