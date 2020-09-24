<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\{User,company_dataset,Insurance};
use App\Http\Requests\{CompanyRequest,datasetRequest,insuranceRequest, ProfileRequest};

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

        $user = Auth::user();
        $countries = $this->getCountries();
        $states = CountryState::getStates('MX');

        if($user->country){
            $states = CountryState::getStates($user->country);
        }

        asort($countries);

        return view('User.profile',compact('user','countries','states'));
    }



    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $user->update($request->only(['name', 'phone', 'email','position']));

        return back()->with('status', 'Actualizado con exito');
    }



    public function changePassword(Request $request)
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

            return back()->with('errorPassword', 'Contraseña no coincide');
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

        $user->update($request->only(['company_name','company_address','city','zip_code','country','state']));

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
     * Funcion que guarga o actualiza la informacion de la compañia del usuario
     *
     * @param  \App\Http\Requests\userRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDataset(datasetRequest $request)
    {
        //dd($request->all());
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
            ]
        );


        return back()->with('status', 'Actualizado con exito');
    }


    /**
     * Funcion que guarga o actualiza la informacion de los certificados de seguro
     * con los que cuenta el usuario
     *
     * @param  \App\Http\Requests\insuranceRequest;  $request
     */
    public function updateInsurance(insuranceRequest $request)
    {
        $user=Auth::user()->id;

        $dataset = Insurance::updateOrCreate(
            [
                'user_id' => $user
            ],[
                'name_insurance'                => $request->name_insurance, 
                'contact_name'                  => $request->contact_name, 
                'general_liability_ins'         => $request->has('general_liability_ins'),
                'commercial_general_liability'  => $request->has('commercial_general_liability'),
                'auto_liability'                => $request->has('auto_liability'),
                'motor_truck_cargo'             => $request->has('motor_truck_cargo'),
                'trailer_interchange'           => $request->has('trailer_interchange'),
                'another_insurance'             => $request->another_insurance,
            ]
        );

        return back()->with('status', 'Actualizado con exito');
    }


    /**
     * Funcion que permite cambiar la imagen de perfil del usuario
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'avatar.required'   => 'La imagen de perfil es requerida',
            'avatar.mimes'      => 'La imagen de perfil debe de ser de tipo: jpeg, png, jpg, gif, svg',
            'avatar.image'      => 'Debe de ser una imagen',
            'avatar.max'        => 'La imagen no debe de pesar más de 2048 Kb'

        ]);

        $user = Auth::user();

        //Si el usuario no ha cambiado la imagen de perfil por defecto
        if($user->avatar == 'avatars/avatar.jpg'){
            $user->avatar =  $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }else{
            //Si ya tenia una, cambiarla
            Storage::disk('public')->delete($user->avatar);
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }

        return back()->with('status', 'Imagen de perfil actualizada con exito');

    }

    /*
    * Retorna el array de paises que si tienen registrados sus estados, o alguno errores
    *
    */
    public function getCountries()
    {
        //trae todos los paises
        $allCountries = CountryState::getCountries('spa');
        $countries = [];
        foreach ($allCountries as $key => $country) {
            if(CountryState::getStates($key) == []){
                continue;
            }else if(in_array($key, ['PH','SY','TM'])){
                continue;
            }
            else{
                $countries[$key] = $country;
            }
        }

        asort($countries);
        return $countries;
    }

}
