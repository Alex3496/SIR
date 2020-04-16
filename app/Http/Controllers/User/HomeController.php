<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();

        return view('User.home',[
            'user' => $user
        ]);
    }
}
