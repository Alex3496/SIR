<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = Auth::user();

    	return view('Admin.home',compact('usersCount','user'));
    }



    public function showProfile()
    {
        $user = Auth::user();

        return view('Admin.profile.index',compact('user'));
    }



    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $user->update($request->only(['name', 'phone', 'email','position']));

        return back()->with('status', 'Actualizado con exito');
    }



    public function updatePassword(Request $request)
    {
        $user = Auth::user();


        $request = $request->validate([
            'password' => 'required|string|max:50',
            'new_password' => 'required|min:8|string|max:50|confirmed',
        ]);

        if(Hash::check($request['password'],$user->password)){
            
            $user->password = Hash::make($request['new_password']);
            $user->save();

            return back()->with('status', 'Contraseña actualizad con exito');

        } else {

            return back()->with('errorB', 'La contraseña no coincide');

        }

    }
}
