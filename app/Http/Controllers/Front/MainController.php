<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;

class MainController extends Controller
{
    public function index(){
        return view('front.home',); 
    }
}
