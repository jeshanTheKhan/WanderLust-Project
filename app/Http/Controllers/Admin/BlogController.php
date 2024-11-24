<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use Image;

class BlogController extends Controller
{
    //
    public function index(){
        return view('Admin.Blog.index');
    }
    // Insert Data
    public function save(Request $req){
        $store=New Blog();
        $store->blog_header=$req->header;
        $store->blog_date=$req->date;
        $store->blog_posted = Auth::check() ? Auth::user()->name . ' ' . (Auth::user()->last_name ?? '') : 'Guest User';
        $store->blog_short_description=$req->short_description;
        $store->blog_main_description=$req->long_description;

        if ($req->file('main_thumbnail')) {
            $image = $req->file('main_thumbnail');
            $image_ext = chr(rand(65, 90)) .'-'.rand(00000, 99999). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/back/media/blog/' . $image_ext);
            $store->blog_main_image = $image_ext;
        }
        $store->save();
        if($store){
            $notification = array(
                'message' => 'Blog Added Successfully',
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
        $blog=Blog::all();
        return view('Admin.Blog.table',compact('blog'));
    }
}
