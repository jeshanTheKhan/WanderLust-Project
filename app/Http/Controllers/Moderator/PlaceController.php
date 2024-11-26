<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use Str;

class PlaceController extends Controller
{
    //
    public function index(){
        return view('Moderator.Place.index');
    }
    // Save
    public function save(Request $req){
        $store=New Place();
        $store->place_name=$req->name;
        $store->place_slug=Str::slug($req->name);
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Place Added Successfully',
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
        $data=Place::all();
        return view('Moderator.Place.table',compact('data'));
    }
    // Status Update
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = Place::find($id);

 
        $data->place_status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Load Edit
    public function edit($id){
        $data=Place::find($id);
        return view('Moderator.Place.edit',compact('data'));

    }
    // Update
    public function update(Request $req){
        $store=Place::find($req->c_id);
        $store->place_name=$req->name;
        $store->place_slug=Str::slug($req->name);
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Place Update Successfully',
                'alert-type' => 'success'
            );
        }
        else{
            $notification = array(
                'message' => 'Failed To Update!!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('moderator.all.place')->with($notification);
    }
     // Delete
     public function del($id){
        $result = Place::find($id);
        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'Place Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
