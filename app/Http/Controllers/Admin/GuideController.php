<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\Place;
use Image;

class GuideController extends Controller
{
    //
    public function index(){
        $place=Place::all();
        return view('Admin.Guide.index',compact('place'));
    }
    // Add 
    public function save(Request $req){
        $store=New Guide();
        $store->guide_name=$req->header;
        $store->guide_fb=$req->facebook;
        $store->guide_instagram=$req->instagram;
        $store->guide_linkdln=$req->linkdln;
        $store->place=$req->place;
        $store->guide_twitter=$req->twitter;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/guide/' . $image_ext);
            $store->guide_image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Guide Added Successfully',
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
        $data=Guide::all();
        return view('Admin.Guide.table',compact('data'));
    }
}
