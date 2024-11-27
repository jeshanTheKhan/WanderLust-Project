<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ShopAdminController extends Controller
{
    //
    public function index(){
        return view('Shop.dashboard');
    }
    public function edit(Request $request): View
    {
        return view('shop_profile.edit', [
            'user' => $request->user(),
        ]);
    }
public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function upload(Request $req){
        
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
