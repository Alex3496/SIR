<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    //

    public function aboutUs()
    {
       return view('aboutUs');
    }

    public function contactUs(){
        return view('contact');
    }
}
