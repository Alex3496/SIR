<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\{User,Role,company_dataset,Insurance};
use Illuminate\Http\Request;
use App\Http\Requests\{ProfileRequest,CompanyRequest,datasetRequest,insuranceRequest,UserRegRequest};
use CountryState;

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

        $users = User::all()->except(Auth::id());

        return view('Admin.Users.Index',compact('users','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('Admin.Users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegRequest $request)
    {
        if($request['role'] == '2' || $request['role'] == '1') $request['type_company_user'] = 'Administrador';

        $user = User::create($request->all());

        $user->roles()->attach($request['role']);

        return redirect()->route('admin.users.index')->with('status','creado con exito');
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
        $dataset = $userToEdit->dataset;
        $insurance = $userToEdit->insurance;
        $roles = Role::all();
        $user = Auth::user();
        $countries = CountryState::getCountries('spa');
        asort($countries);
        if($userToEdit->country){
            $states = CountryState::getStates($userToEdit->country);
        }else{
            $states = [];
        }

        return view('Admin.Users.Edit',compact('userToEdit','dataset','insurance','roles','user','countries','states'));
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
        dd($user);
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Admin update profile of user
     *
     * @param  \Illuminate\Http\ProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfiles(ProfileRequest $request, User $user)
    {
        $user->update($request->only(['name', 'phone', 'email','position']));

        return back()->with('status', 'Actualizado con exito');

    }


    /**
     * Admin update company info 
     *
     * @param  \Illuminate\Http\ProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(CompanyRequest $request, User $user)
    {

        $user->update($request->only(['company_name', 'company_address', 'zip_code','city','country','state']));

        return back()->with('status', 'Actualizado con exito');

    }

    /**
     * Admin update company info 
     *
     * @param  \Illuminate\Http\ProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateDataset(datasetRequest $request, User $user)
    {

        $dataset = company_dataset::updateOrCreate(
            [
                'user_id' => $user->id
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
     * create or update the user insurance data.
     *
     * @param  \App\Http\Requests\Request;  $request
     */
    public function updateInsurance(insuranceRequest $request, User $user)
    {

        $dataset = Insurance::updateOrCreate(
            [
                'user_id' => $user->id
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

    public function find (Request $request)
    {

        $users = User::orderby('id','DESC')
            ->name($request->name)
            ->company($request->company_name)
            ->email($request->email)
            ->get();

        $user = Auth::user();

        return view('Admin.Users.Index',compact('users','user'));
    }
}
