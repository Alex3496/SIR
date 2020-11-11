<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LocationRequest;

use App\Location;
use CountryState;

class LocationController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if($request->all() == []){
            $locations = Location::orderby('id','DESC')->where('status','PENDING')->get();
        }else{
            $locations = Location::orderby('id','DESC')
                ->city($request->city)
                ->state($request->state)
                ->country($request->country)
                ->status($request->status)
                ->get();

        }

        return view('Admin.locations.index',compact('user','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $countries = $this->getCountries();
        $states = CountryState::getStates('MX');
        asort($countries);
        return view('Admin.locations.create',compact('user','countries','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $countries = CountryState::getCountries('spa');
        $country = $countries[$request->country];
        $state =  CountryState::getStateName($request->state,$request->country);

        $locationComplete = $request->city.', '.$state.', '.$country;

        $new = Location::firstOrCreate([
                'city' => $request->city,'state' => $state,'country' => $country,]
            ,[
                'state_code' => $request->state,
                'country_code' => $request->country,
                'status' => $request->status,
                'location_complete' => $locationComplete, 
        ]);

        return redirect()->route('admin.locations.index')->with('status','Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= Auth::user();
        $location = Location::findOrFail($id);
        $countries = CountryState::getCountries('spa');
        $states = CountryState::getStates($location->country_code);
        asort($countries);
        return view('Admin.locations.edit',compact('user','location','countries','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\LocationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        $location = Location::where('city',$request->city)
        ->where('state_code',$request->state)->where('country_code',$request->country)->where('status',$request->status)->first();

        $countries = CountryState::getCountries('spa');
        $country = $countries[$request->country];
        $state =  CountryState::getStateName($request->state,$request->country);

        $locationComplete = $request->city.', '.$state.', '.$country;

        if(is_null($location)){

            $locationToUpdate = Location::findOrFail($id);

            $locationToUpdate->city = $request->city;
            $locationToUpdate->state = $state;
            $locationToUpdate->state_code = $request->state;
            $locationToUpdate->country = $country;
            $locationToUpdate->country_code = $request->country;
            $locationToUpdate->status = $request->status;
            $locationToUpdate->location_complete = $locationComplete;
            
            $locationToUpdate->save();

            return redirect()->route('admin.locations.index')->with('status','Actualizado con exito');
            
        }else{
           return back()->with('status','La ubicacion ya existe');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        $location->delete();

        return redirect()->route('admin.locations.index')->with('status','Eliminado con exito');
    }


     /*
    * Retorna el array de paises que si tienen registrados sus estados,y excluye algunos con errores
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
