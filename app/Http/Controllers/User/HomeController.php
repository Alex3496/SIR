<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Auth; /*IMPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Save;

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
        $user = Auth::user();

        $tariffsSaved = $user->tariffsFav;

        return view('User.home.index',[
            'user'          => $user,
            'tariffsSaved'  => $tariffsSaved,
        ]);
    }
}
