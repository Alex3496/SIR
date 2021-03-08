<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\EquipmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; /*IMPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use Illuminate\Http\Request;

use CountryState;
use App\Equipment;

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
        $states_mx = CountryState::getStates('MX');
        $states_us = CountryState::getStates('US');
        $equipments = Equipment::where('user_id',$user->id)->paginate(15);

        return view('User.Equipment.index',[
            'user'          => $user,
            'states_mx'      => $states_mx,
            'states_us'      => $states_us,
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

        $equipo = Equipment::create($request->all());

        return redirect()->route('equipment.index')->with('status','Equipo agregado con exito');
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

        $states_mx = CountryState::getStates('MX');
        $states_us = CountryState::getStates('US');

        return view('User.Equipment.index',[
            'user'=>$user,
            'equipmentToUpdate' => $equipmentToUpdate,
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

        $equipmentToUpdate->update($request->all());

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
}
