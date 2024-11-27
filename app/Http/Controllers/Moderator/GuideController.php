<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\Place;
use Image;

class GuideController extends Controller
{
    //
    public function index(){
        $place=Place::where('place_status',1)->get();
        return view('Moderator.Guide.index',compact('place'));
    }
    // Add 
    public function save(Request $req){
        $store=New Guide();
        $store->guide_name=$req->header;
        $store->guide_fb=$req->facebook;
        $store->guide_instagram=$req->instagram;
        $store->guide_linkdln=$req->linkdln;
        $store->place=$req->place;
        $store->guide_twitter=$req->twitter;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/guide/' . $image_ext);
            $store->guide_image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Guide Added Successfully',
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
        $data=Guide::all();
        return view('Moderator.Guide.table',compact('data'));
    }
    // Status Update
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = Guide::find($id);

 
        $data->guide_status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Edit Page
    public function edit($id){
        $place=Place::where('place_status',1)->get();
        $guide=Guide::find($id);
        return view('Moderator.Guide.edit',compact('place','guide'));
    }
    // Update
    public function update(Request $req){
        $store=Guide::find($req->c_id);
        $store->guide_name = $req->header ?? $store->guide_name; // Update if new value exists, otherwise keep old value
        $store->guide_fb = $req->facebook ?? $store->guide_fb;
        $store->guide_instagram = $req->instagram ?? $store->guide_instagram;
        $store->guide_linkdln = $req->linkdln ?? $store->guide_linkdln;
        $store->place = $req->place ?? $store->place;
        $store->guide_twitter = $req->twitter ?? $store->guide_twitter;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/guide/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/guide/' . $store->images)) {
                 unlink('storage/back/media/guide/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->guide_image = $image_ext;
             $store->save();
         }
         $store->save();
         if ($store) {
             $notification = array(
                 'message' => 'Guide Update Successfully',
                 'alert-type' => 'success'
             );
         } else {
             $notification = array(
                 'message' => 'Failed To update!!',
                 'alert-type' => 'error'
             );
         }
         return redirect()->route('moderator.all.guide')->with($notification);  
    }
    // Delete
    public function del($id){
        $result = Guide::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->guide_image) {
            $imagePath = 'storage/back/media/guide/' . $result->guide_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Guide Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
