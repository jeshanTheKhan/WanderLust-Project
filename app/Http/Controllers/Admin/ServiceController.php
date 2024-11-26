<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;

class ServiceController extends Controller
{
    //
    public function index(){
        return view("Admin.Service.index");
    }
    // Add Services
    public function save(Request $request){
        $store=New Service();
        $store->service_header=$request->header;
        $store->service_description= $request->description;
        if ($request->file('main_thumbnail')) {
            $image = $request->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/Services/' . $image_ext);
            $store->service_icon = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Services Added Successfully',
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
    $service =Service::all();
    return view('Admin.Service.table',compact('service'));
}

    // Status Update
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = Service::find($id);

 
        $data->service_status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Edit Page Load
    public function edit($id){
        $service = Service::find($id);
        return view('Admin.Service.edit',compact('service'));
    }
    // Update
    public function update(Request $req){
        $store = Service::find($req->id);
        $store->service_header = $req->header ?? $store->service_header;
       $store->service_description = $req->description ?? $store->service_description;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/Services/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/Services/' . $store->service_icon)) {
                 unlink('storage/back/media/Services/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->service_icon = $image_ext;
             $store->save();
         }
         $store->save();
         if ($store) {
             $notification = array(
                 'message' => 'Carosel Update Successfully',
                 'alert-type' => 'success'
             );
         } else {
             $notification = array(
                 'message' => 'Failed To update!!',
                 'alert-type' => 'error'
             );
         }
         return redirect()->route('admin.all.services')->with($notification);  
    }
    // Delete
    public function del($id){
        $result = Service::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->service_icon) {
            $imagePath = 'storage/back/media/Services/' . $result->service_icon;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Services Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
