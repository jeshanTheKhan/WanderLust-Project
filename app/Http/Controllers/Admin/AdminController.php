<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_role;
use Hash;

class AdminController extends Controller
{
    //
    public function index(){
        return view('Admin.admindashboard');
    }

    public function user_index(){
        $type=user_role::where('user_status','1')->get();
        return view('Admin.User.index',compact('type'));
    }

    public function save(Request $req){
        $store=New User();
        $store->name=$req->header1;
        $store->user_role=$req->user;;
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
        $type=user_role::all();
        return view('Admin.User.edit',compact('data','type'));
    }
    public function update(Request $req){
        $store=User::find($req->c_id);
        $store->name = $req->header1 ?? $store->name;
        $store->user_role = $req->user ?? $store->user_role;
        $store->email = $req->email ?? $store->email;
        $store->password = $req->password ? Hash::make($req->password) : $store->password;

        $store->save();
        if($store){
            $notification = array(
                'message' => 'User Update Successfully',
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
    public function del($id){
        $result = User::find($id);

        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
    // Type
    // Index
    public function type_index(){
        return view('Admin.User_type.index');
    }
    public function user_role(Request $req){
        $store=New User_role();
        $store->user_type=$req->header;

        $store->save();
        if($store){
            $notification = array(
                'message' => 'User_Role Added Successfully',
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
    public function type_table(){
        $data=User_role::all();
        return view('Admin.User_type.table',compact('data'));
    }
    // Status Update
    public function user_roleUpdateStatus(Request $request, $id)
    {
    
        $data = User_role::find($id);

 
        $data->user_status = $request->input('status');
        $data->save();  

  
        return redirect()->back()->with('status', 'Status updated successfully!');
    }
    public function user_roleedit($id){
        $data=User_role::find($id);
        return view('Admin.User_type.edit',compact('data'));
    }
    public function user_roleupdate(Request $req){
        $store=User_role::find($req->c_id);
        $store->user_type = $req->header ?? $store->user_type;


        $store->save();
        if($store){
            $notification = array(
                'message' => 'User_Role Update Successfully',
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
    public function user_roledel($id){
        $result = User_role::find($id);

        // Delete the database entry
        $result->delete();
        
        $notification = array(
            'message' => 'User_Role Deleted Successfully',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
}
