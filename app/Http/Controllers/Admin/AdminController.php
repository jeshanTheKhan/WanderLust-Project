<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    //
    public function index(){
        return view('Admin.admindashboard');
    }

    public function user_index(){
        return view('Admin.User.index');
    }

    public function save(Request $req){
        $store=New User();
        $store->name=$req->header1;
        $store->user_role='shop_kepper';
        $store->email =$req->email;
        $store->password = Hash::make($req->password);

        $store->save();
        if($store){
            $notification = array(
                'message' => 'User Added Successfully',
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
    // DataBase
    public function table(){
        $data=User::all();
        return view('Admin.User.table',compact('data'));
    }
    // Status Update
    public function UpdateStatus(Request $request, $id)
    {
    
        $data = User::find($id);

 
        $data->status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    // Load Edit Page
    public function edit($id){
        $data=User::find($id);
        return view('Admin.User.edit',compact('data'));
    }
}
