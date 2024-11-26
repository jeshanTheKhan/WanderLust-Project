<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Carosel;
use Str;
use Image;

class CaroselController extends Controller
{
    //
    public function index(){
        return view('Moderator.Carosel.index');
    }
    // Insert Data
    public function addSave(Request $req){
        
        $store= new Carosel();
        $store->header1=$req->header1;
        $store->header2=$req->header2;
        $store->header3=$req->header3;
        $store->link=Str::slug($req->header1);
       

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/carosel/' . $image_ext);
            $store->images = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Carosel Added Successfully',
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
    //DataBase
    public function table(){
        $data=Carosel::all();
        return view('Moderator.Carosel.table',compact('data'));
    }
     // Status Update
     public function UpdateStatus(Request $request, $id)
     {
     
         $data = Carosel::find($id);
 
  
         $data->status = $request->input('status');
         $data->save();  
 
   
         return redirect()->back()->with('status', 'Status updated successfully!');
     }
     // Edit Page Load
    public function edit($id){
        $data=Carosel::find($id);
        return view('Moderator.Carosel.edit',compact('data'));
    }
     // Update
     public function update(Request $req)
     {
        $store=Carosel::find($req->c_id);
        $store->header1=$req->header1;
        $store->header2=$req->header2;
        $store->header3=$req->header3;
        $store->link=Str::slug($req->header1);
 
         if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
         
             // Resize and save the image
             Image::make($image)->resize(300, 300)->save('storage/back/media/carosel/' . $image_ext);
         
             // Delete the old image if it exists
             if ($store->images && file_exists('storage/back/media/carosel/' . $store->images)) {
                 unlink('storage/back/media/carosel/' . $req->old_img);
             }
         
             // Update the database record with the new image name
             $store->images = $image_ext;
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
         return redirect()->route('moderator.all.carosel')->with($notification);  
 
     }
       // Delete
    public function del($id){
        $result = Carosel::find($id);
        
        // Check if the image file exists and delete it
        if ($result && $result->images) {
            $imagePath = 'storage/back/media/carosel/' . $result->images;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Carosel Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
