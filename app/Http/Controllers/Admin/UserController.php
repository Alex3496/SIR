<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\{User,Role,company_dataset,Insurance,Tariff,Operator,Equipment,Vehicle };
use Illuminate\Http\Request;
use App\Http\Requests\{ProfileRequest,CompanyRequest,datasetRequest,insuranceRequest,UserRegRequest};
use Illuminate\Support\Facades\Hash;
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

        $users = User::orderby('created_at','DESC')->where('id','!=',Auth::id())->paginate(10);

        return view('Admin.Users.Index',compact('users','user'));
    }

    /**
     * Muestra todas las tarifas que el usuario tiene(paginar)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $truckTariffs = Tariff::truckTariffs($id)->get();
        $trainTariffs = Tariff::trainTariffs($id)->get();
        $maritimeTariffs = Tariff::maritimeTariffs($id)->get();
        $aerialTariffs = Tariff::aerialTariffs($id)->get();

        return view ('Admin.Users.showTariffs',compact('user','truckTariffs','trainTariffs','maritimeTariffs','aerialTariffs'));
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

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        $user->roles()->attach($request['role']);

        return redirect()->route('admin.users.index')->with('status','creado con exito');
    }

    /**
     * Muestra toda la informacion del usuario en cuestion
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userToEdit = $user;
        $operators = $userToEdit->operators->count();
        $equipments = $userToEdit->equipments->count();
        $vehicles = $userToEdit->vehicles->count();
        $dataset = $userToEdit->dataset;
        $insurance = $userToEdit->insurance;
       /* $roles = Role::all();*/
        $user = Auth::user();
        $countries = $this->getCountries();
        asort($countries);
        $totalTariffs = Tariff::where('user_id',$userToEdit->id)->count();
        if($userToEdit->country){
            $states = CountryState::getStates($userToEdit->country);
        }else{
            $states = CountryState::getStates('MX');
        }

        return view('Admin.Users.Edit',compact('userToEdit','dataset','insurance','user','countries','states','totalTariffs','operators','equipments','vehicles'));
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
     * Funcion que permite al admin crear o actualizar la informacion de las certificaciones de seguro, con las que
     * cuenta el usaurio
     *
     * @param  \App\Http\Requests\insuranceRequest  $request
     * @param  \App\User  $user 
     */
    public function updateInsurance(insuranceRequest $request, User $user)
    {

        $dataset = Insurance::updateOrCreate(
            [
                'user_id' => $user->id
            ]
            ,
            [
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
     * Deletes user
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();

        //Detach tariff's user of all the favs of users
        $tariffsUser = Tariff::where('user_id',$user->id)->get();
        foreach ($tariffsUser as $tariff) {
            $tariff->userfav()->detach();
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Admin can delete a user's tariff
     *
     * @param  Tariff $tariff
     * @return \Illuminate\Http\Response
     */
    public function destroyTariff(Tariff $tariff)
    {
        $tariffToDelete = Tariff::findOrFail($tariff->id);

        //detach all tariffs of users fav list 
        $tariffToDelete->userfav()->detach();

        $tariffToDelete->delete();

        return back()->with('status', 'Eliminado con exito'); 
    }

    /**
     *  Lista de usuarios registrados con filtros
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function find (Request $request)
    {

        $company_name = $request->company_name;
        $name = $request->name;
        $email = $request->email;

        $users = User::orderby('id','DESC')
            ->name($name)
            ->company($company_name)
            ->email($email)
            ->paginate(10);

        $user = Auth::user();

        return view('Admin.Users.Index',compact('users','user','company_name','name','email'));
    }

    /**
     * Retona los activos con los que cuenta el usuario
     *
     * @param  num $user_id
     * @return \Illuminate\Http\Response
     */
    public function actives($user_id)
    {
        $user = Auth::user();
        $userToEdit = User::findOrFail($user_id);
        $operators = Operator::where('user_id',$user_id)->paginate(10);
        $equipments = Equipment::where('user_id',$user_id)->paginate(10);
        $vehicles = Vehicle::where('user_id',$user_id)->paginate(10);
        //dd($equipments);
        return view('Admin.Users.actives',compact('userToEdit','user','equipments','operators','vehicles'));
    }

    /*
    * Retorna el array de paises que si tienen registrados sus estados
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
