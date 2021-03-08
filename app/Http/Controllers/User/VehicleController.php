<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\VehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /*IMPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 

use CountryState;
use App\Vehicle;

class VehicleController extends Controller
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
        $states_mx = CountryState::getStates('MX');
        $states_us = CountryState::getStates('US');
        $vehicles = Vehicle::where('user_id',$user->id)->paginate(15);

        return view('User.Vehicle.index',[
            'user'         => $user,
            'states_mx'    => $states_mx,
            'states_us'    => $states_us,
            'vehicles'     => $vehicles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $request['user_id'] = Auth::user()->id;

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

        $equipo = Vehicle::create($request->all());

        return redirect()->route('vehicle.index')->with('status','vehículo agregado con exito');
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
        $vehicleToUpdate=Vehicle::findOrFail($id);
        $this->authorize('pass',$vehicleToUpdate);

        if($vehicleToUpdate->state_mx && $vehicleToUpdate->state_us){
            $vehicleToUpdate->plates = 'P_both';
        }else if($vehicleToUpdate->state_mx){
            $vehicleToUpdate->plates = 'P_MX';
        }else if($vehicleToUpdate->state_us){
            $vehicleToUpdate->plates = 'P_US';
        }
        $states_mx = CountryState::getStates('MX');
        $states_us = CountryState::getStates('US');

        return view('User.Vehicle.index',[
            'user'=>$user,
            'vehicleToUpdate' => $vehicleToUpdate,
            'states_mx' => $states_mx,
            'states_us' => $states_us,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicleToUpdate=Vehicle::findOrFail($id);
        $this->authorize('pass',$vehicleToUpdate);

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

        $vehicleToUpdate->update($request->all());

        return redirect()->route('vehicle.index')->with('status','Equipo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle=Vehicle::findOrFail($id);
        $this->authorize('pass',$vehicle);
        
        $vehicle->delete();

        return redirect()->route('vehicle.index')->with('status','Eliminado con exito');
    }
}
