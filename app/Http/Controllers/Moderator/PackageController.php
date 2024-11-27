<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Place;
use Str;
use Image;

class PackageController extends Controller
{
     //Index
     public function index(){
        $place=Place::where('place_status',1)->get();
        return view('Moderator.Package.index',compact('place'));
    }
    public function save(Request $req){
        $store=New Package();
        $store->package_name=$req->header;
        $store->package_slug=Str::slug($req->header);
        $store->short_description=$req->description;
        $store->main_description=$req->long_description;
        $store->place=$req->place;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/package/' . $image_ext);
            $store->package_images = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Package Added Successfully',
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
    // Database
    // Table
    public function table(){
        $data=Package::all();
        return view('Moderator.Package.table',compact('data'));
    }
     // Status Update
     public function UpdateStatus(Request $request, $id)
     {
     
         $data = Package::find($id);
 
  
         $data->package_status = $request->input('status');
         $data->save();  
 
   
         return redirect()->back()->with('status', 'Status updated successfully!');
     }
     // Load Edit
    public function edit($id){
        $place=Place::where('place_status',1)->get();
        $data=Package::find($id);
        return view('Moderator.Package.edit',compact('data','place'));
    }
     // Update
     public function update(Request $req){
        $store=Package::find($req->c_id);
        // Update or keep previous values
        $store->package_name = $req->header ?? $store->package_name; // Update if provided, keep existing otherwise
        $store->package_slug = Str::slug($req->header ?? $store->package_name); // Ensure slug consistency
        $store->short_description = $req->description ?? $store->short_description;
        $store->main_description = $req->long_description ?? $store->main_description;
        $store->place = $req->place ?? $store->place;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/package/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/package/' . $store->images)) {
                 unlink('storage/back/media/package/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->package_images = $image_ext;
             $store->save();
         }
         $store->save();
         if ($store) {
             $notification = array(
                 'message' => 'Package Update Successfully',
                 'alert-type' => 'success'
             );
         } else {
             $notification = array(
                 'message' => 'Failed To update!!',
                 'alert-type' => 'error'
             );
         }
         return redirect()->route('moderator.all.package')->with($notification);  
    }
    // Delete
    public function del($id){
        $result = Package::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->package_images) {
            $imagePath = 'storage/back/media/package/' . $result->package_images;
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
