<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopAdminController extends Controller
{
    //
    public function index(){
        return view('Shop.dashboard');
    }
}