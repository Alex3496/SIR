<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{CompanyRequest,datasetRequest,insuranceRequest, ProfileRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use Illuminate\Support\Facades\Hash;
use App\{User,company_dataset,Insurance};
use CountryState;
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
     * Show the view to edit the profile
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user=Auth::user();

        $countries = CountryState::getCountries('spa');

        return view('User.profile',compact('user','countries'));
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

            return back()->with('errorB', 'Contraseña no coincide');

        }
             
    }


    /**
     * Update the user auth.
     *
     * @param  \App\Http\Requests\CompanyRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(CompanyRequest $request)
    {
        $user = Auth::user();

        $user->update($request->only(['company_name','company_address','city','zip_code','country']));

        return back()->with('status', 'Actualizado con exito');
    }


    /**
     * Display view company profile
     *
     * @return \Illuminate\Http\Response
     */
    public function showCompany()
    {
        $user = Auth::user();
        $dataset = $user->dataset;
        $insurance = $user->insurance;

        return view('User.companyProfile',compact('user','dataset','insurance'));
    }

    /**
     * create or update the user dataset.
     *
     * @param  \App\Http\Requests\userRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDataset(datasetRequest $request)
    {
        $user=Auth::user()->id;

        $dataset = company_dataset::updateOrCreate(
            [
                'user_id' => $user
            ]
            ,
            [
                'dba_name' => $request->dba_name,
                'scac_code' => strtoupper($request->scac_code),
                'caat' => $request->caat,
                'mc_number' => $request->mc_number,
                'num_trucks' => $request->num_trucks,
                'certificate_ctpat' => $request->certificate_ctpat,
                'certificate_oae' => $request->certificate_oae,
                'fast' => $request->fast, 

                'warehouse' => $request->warehouse, 
                'fiscal_warehouse' => $request->fiscal_warehouse, 
                'position' => $request->position, 
            ]
        );


        return back()->with('status', 'Actualizado con exito');
    }


    /**
     * create or update the user insurance data.
     *
     * @param  \App\Http\Requests\Request;  $request
     */
    public function updateInsurance(insuranceRequest $request)
    {
        //dd($request->all());
        $user=Auth::user()->id;

        $dataset = Insurance::updateOrCreate(
            [
                'user_id' => $user
            ]
            ,
            [
                'name_insurance' => $request->name_insurance, 
                'contact_name' => $request->contact_name, 
                'general_liability_ins' => $request->has('general_liability_ins'),
                'commercial_general_liability' => $request->has('commercial_general_liability'),
                'auto_liability' => $request->has('auto_liability'),
                'motor_truck_cargo' => $request->has('motor_truck_cargo'),
                'trailer_interchange' => $request->has('trailer_interchange'),
            ]
        );

        return back()->with('status', 'Actualizado con exito');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if($user->avatar == 'avatars/avatar.jpg'){
            $user->avatar =  $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }else{

            Storage::disk('public')->delete($user->avatar);
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }

        return back()->with('status', 'Imagen de perfil actualizada con exito');

    }

}
