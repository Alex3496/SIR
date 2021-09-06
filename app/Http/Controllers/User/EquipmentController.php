<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\EquipmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; /*IMPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use Illuminate\Http\Request;

use CountryState;
use App\{Equipment, Location};
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLocationMessage;

class EquipmentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $equipments = Equipment::where('user_id',$user->id)->paginate(15);

        return view('User.Equipment.index',[
            'user'          => $user,
            'equipments'     => $equipments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        $request['user_id'] = Auth::user()->id;

        //poner datos en Mayusculas
        if($request['plates'] == 'P_US'){
            $request['state_mx'] = null;
            $request['plates_mx'] = null;
        }

        if($request['plates'] == 'P_MX'){
            $request['state_us'] = null;
            $request['plates_us'] = null;
        }
        $request['economic'] = strtoupper($request['economic']);
        $request['plates_us'] = strtoupper($request['plates_us']);
        $request['plates_mx'] = strtoupper($request['plates_mx']);
        $request['vin'] = strtoupper($request['vin']);

        //Pone las palabras en minustculas y la primera en mayuscula
        $request['origin'] = ucwords(strtolower($request->origin));
        $request['destiny'] = ucwords(strtolower($request->destiny));

         //Obtener la ubicacion completa del origen
        $countries = CountryState::getCountries('spa');
        $country = $countries[$request->origin_country];
        $state =  CountryState::getStateName($request->origin_state,$request->origin_country);
        $request['complete_origin'] = $request->origin.', '.$state.', '.$country;

        //Obtener la ubicacion completa del destino
        $country = $countries[$request->destiny_country];
        $state =  CountryState::getStateName($request->destiny_state,$request->destiny_country);
        $request['complete_destiny'] = $request->destiny.', '.$state.', '.$country;


        $equipo = Equipment::create($request->all());

        $this->storeLocation($request['origin'],$request['origin_state'],$request['origin_country']);
        $this->storeLocation($request['destiny'],$request['destiny_state'],$request['destiny_country']);

        return redirect()->route('equipment.index')->with('status','Equipo agregado con exito');
    }

     /**
     * Muestra el formulario para AÑADIR un equipo nuevo
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $states_mx = CountryState::getStates('MX');
        $states_us = CountryState::getStates('US');
        $equipments = Equipment::where('user_id',$user->id)->paginate(15);

        return view('User.Equipment.show',[
            'user'          => $user,
            'states_mx'      => $states_mx,
            'states_us'      => $states_us,
            'equipments'     => $equipments,
            'countries' => $this->getCountries(),
            'states' => $this->getStates('MX'),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();
        $equipmentToUpdate=Equipment::findOrFail($id);
        $this->authorize('pass',$equipmentToUpdate);

        if($equipmentToUpdate->state_mx && $equipmentToUpdate->state_us){
            $equipmentToUpdate->plates = 'P_both';
        }else if($equipmentToUpdate->state_mx){
            $equipmentToUpdate->plates = 'P_MX';
        }else if($equipmentToUpdate->state_us){
            $equipmentToUpdate->plates = 'P_US';
        }

        //carga informacion de los paises y los estados del pais de la peticion
        $countries = $this->getCountries();
        $states_origin = CountryState::getStates($equipmentToUpdate->origin_country);
        $states_destiny = CountryState::getStates($equipmentToUpdate->destiny_country);

        $states_mx = CountryState::getStates('MX');
        $states_us = CountryState::getStates('US');

        return view('User.Equipment.show',[
            'user'=>$user,
            'equipmentToUpdate' => $equipmentToUpdate,
            'states_mx' => $states_mx,
            'states_us' => $states_us,
            'countries' => $countries,
            'states_origin' => $states_origin,
            'states_destiny' => $states_destiny,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentRequest $request, $id)
    {
        $equipmentToUpdate=Equipment::findOrFail($id);
        $this->authorize('pass',$equipmentToUpdate);

        if($request['plates'] == 'P_US'){
            $request['state_mx'] = null;
            $request['plates_mx'] = null;
        }

        if($request['plates'] == 'P_MX'){
            $request['state_us'] = null;
            $request['plates_us'] = null;
        }

        //poner datos en Mayusculas
        $request['economic'] = strtoupper($request['economic']);
        $request['plates_us'] = strtoupper($request['plates_us']);
        $request['plates_mx'] = strtoupper($request['plates_mx']);
        $request['vin'] = strtoupper($request['vin']);

        $request['origin'] = ucwords(strtolower($request->origin));
        $request['destiny'] = ucwords(strtolower($request->destiny));

        //Obtener la ubicacion completa del origen
        $countries = CountryState::getCountries('spa');
        $country = $countries[$request->origin_country];
        $state =  CountryState::getStateName($request->origin_state,$request->origin_country);
        $request['complete_origin'] = $request->origin.', '.$state.', '.$country;

        //Obtener la ubicacion completa del destino
        $country = $countries[$request->destiny_country];
        $state =  CountryState::getStateName($request->destiny_state,$request->destiny_country);
        $request['complete_destiny'] = $request->destiny.', '.$state.', '.$country; 

        $equipmentToUpdate->update($request->all());

        $this->storeLocation($request['origin'],$request['origin_state'],$request['origin_country']);
        $this->storeLocation($request['destiny'],$request['destiny_state'],$request['destiny_country']);

        return redirect()->route('equipment.index')->with('status','Equipo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment=Equipment::findOrFail($id);
        $this->authorize('pass',$equipment);

        $equipment->delete();

        return redirect()->route('equipment.index')->with('status','Eliminado con exito');
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

    /*
    * Retorna un array con los estados de un pais
    */ 
    public function getStates($country)
    {
        return CountryState::getStates('MX');
    }

     /**
    *   Guarda en la BD las ubicaciones nuevas, verfica que no exitan y las guarda, si se agrega una
    *   manda un correo de notif
    *
    *   @param string $city
    *   @param string $state (code)
    *   @param string $country (code)
    */
    public function storeLocation($city,$state_code,$country_code)
    {
        $countries = CountryState::getCountries('spa');
        $country = $countries[$country_code];
        $state =  CountryState::getStateName($state_code,$country_code);


        $locationComplete = $city.', '.$state.', '.$country;
        $newLocation = Location::firstOrCreate([
                'city' => $city,'state' => $state,'country' => $country,]
            ,[
                'state_code' => $state_code,
                'country_code' => $country_code,
                'status' => 'PENDING',
                'location_complete' => $locationComplete, 
        ]);

        //Si la ubicacion no estaba registrada en la BD, manda un mensaje de notificaion
        if($newLocation->wasRecentlyCreated){
            Mail::to('info@ibookingsystem.com')
                ->queue(new NewLocationMessage($newLocation->location_complete));
        }


    }
}
