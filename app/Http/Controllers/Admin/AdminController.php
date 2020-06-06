<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{User,Role};

class AdminController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');    
    }

	
    public function index()
    {
    	$usersCount = Role::find(3)->users->count();

    	return view('Admin.home',compact('usersCount'));
    }

    public function showProfile()
    {

        return view('Admin.profile.index');
    }
}
