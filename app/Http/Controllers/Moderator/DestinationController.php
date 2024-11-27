<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Destination;
use Str;
use Image;

class DestinationController extends Controller
{
    //
    public function index(){
        $place=Place::where('place_status',1)->get();
        return view('Moderator.Destination.index',compact('place'));
    }
    // Data Insert
    public function Save(Request $req){
        $store=New Destination();
        $store->destination_place=$req->place;
        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/destination/' . $image_ext);
            $store->destination_image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Destination Added Successfully',
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
        $place=Destination::all();
        return view('Moderator.Destination.table',compact('place'));
    }
    // Status Update
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = Destination::find($id);

 
        $data->destination_status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Edit Page Load
    public function edit($id){
        $place=Place::where('place_status',1)->get();
        $data=Destination::find($id);
        return view('Moderator.Destination.edit',compact('data','place'));
    }
    // Update
    public function update(Request $req){
        $store=Destination::find($req->c_id);
        $store->destination_place = $req->place ?? $store->destination_place;
        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/destination/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/destination/' . $store->images)) {
                 unlink('storage/back/media/destination/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->destination_image = $image_ext;
             $store->save();
         }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Destination Update Successfully',
                'alert-type' => 'success'
            );
        }
        else{
            $notification = array(
                'message' => 'Failed To Add!!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('moderator.all.destination')->with($notification);
    }
    // Delete
    public function del($id){
        $result = Destination::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->destination_image) {
            $imagePath = 'storage/back/media/destination/' . $result->destination_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Destination Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
