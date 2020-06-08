<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');    
    }

    /**
     * Display a list of all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $users = User::all();

        return view('Admin.Users.Index',compact('users','user'));
    }


    /**
     * Show all the information of a specific user 
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userToEdit = $user;

        $roles = Role::all();

        $user = Auth::user();

        return view('Admin.Users.Edit',[
            'user' => $user,
            'userToEdit' => $userToEdit,
            'roles' => $roles 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request);
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //dd($user);

        $user->roles()->detach();

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
