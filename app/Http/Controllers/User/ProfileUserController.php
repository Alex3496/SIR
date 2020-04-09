<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 

class ProfileUserController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user=Auth::user();

        return view('layouts.dashboardUser.profile',[
            'user'=>$user
        ]);
    }
}
