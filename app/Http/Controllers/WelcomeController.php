<?php

namespace App\Http\Controllers;
use App\Models\Carosel;
use App\Models\Service;
use App\Models\Place;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Guide;
use App\Models\Blog;
use App\Models\Testimonial;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){
        $carosel = Carosel::where('status', 1)
                  ->orderBy('carosel_id', 'desc')
                  ->take(3)
                  ->get();
        $place=Place::where('place_status',1)->get();
        $service=Service::where('service_status',1)->take(4)->get();
        $destinations = Destination::where('destination_status', 1)
                           ->select('destination_place') // Select only the destination_place column
                           ->distinct() // Ensure unique results
                           ->get();

         $package=Package::where('package_status',1)->get();
         $guide=Guide::where('guide_status',1)->get();
         $blog=Blog::where('blog_status',1)->get();
         $testimonial=Testimonial::where('status',1)->get();
        return view('welcome',compact('carosel','service','place','package','guide','blog','testimonial'));
    }
}
