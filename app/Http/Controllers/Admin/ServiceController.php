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
}
