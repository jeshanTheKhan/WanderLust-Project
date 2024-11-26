<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ModerateProfileController extends Controller
{
    //
    public function moderator_edit(Request $request): View
    {
        return view('moderator_profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function moderator_upload(Request $req){
        
        $store= User::find($req->c_id);
        $store->name=$req->name;
        $store->last_name=$req->lname;
        $store->email=$req->email;
        $store->phone=$req->phone;
        $store->state=$req->state;
        $store->country=$req->country;
        $store->address=$req->address;
        $store->zipcode=$req->zipcode;
        
         $store->save();
        if($store){
            $notification = array(
                'message' => 'Profile Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Failed To Update!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
}
