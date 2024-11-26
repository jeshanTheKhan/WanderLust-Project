<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModerateAdminController extends Controller
{
    //
    public function index(){
        return view('Moderator.dasboard');
    }
}
