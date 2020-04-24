<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use App\User;
class ProfileUserController extends Controller
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
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user=Auth::user();

        return view('User.profile',[
            'user'=>$user
        ]);
    }


    /**
     * Update the user auth.
     *
     * @param  \App\Http\Requests\userRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, User $user)
    {
        //dd($request->all());
        $user->update($request->all());

        $user->company_address = $request->company_address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;

        $user->save();

        return back()->with('status', 'Actualizado con exito');
    }


}
