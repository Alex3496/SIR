<?php

namespace App\Http\Controllers\User;

use App\Stay;
use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StayRequest;

class StayController extends Controller
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
        $user=Auth::user();

        $stays = Stay::where('user_id',$user->id)->orderBy('created_at', 'DESC')->paginate(15);

        return view('User.Stays.index',[
         'user'=>$user,
         'stays'=>$stays,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();

        return view('User.Stays.create',[
            'user'=>$user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StayRequest $request)
    {
        $request['user_id'] = Auth::user()->id;

        if($request['pays'] == 'payment_operator'){
            $request['customer_charge'] = null;
        }

        if($request['pays'] == 'customer_charge'){
            $request['payment_operator'] = null;
        }

        $estancia = Stay::create($request->all());

        return redirect()->route('stays.index')->with('status','Estancia agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function show(stay $stay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();
        $stay=Stay::findOrFail($id);

        if($stay->payment_operator && $stay->customer_charge){
            $stay->pays = 'both';
        }else if($stay->payment_operator){
            $stay->pays = 'payment_operator';
        }else if($stay->customer_charge){
            $stay->pays = 'customer_charge';
        }

        return view('User.Stays.edit',[
            'user'=>$user,
            'stay' => $stay,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function update(StayRequest $request, stay $stay)
    {
        $stay=Stay::findOrFail($stay->id);

        if($request['pays'] == 'payment_operator'){
            $request['customer_charge'] = null;
        }

        if($request['pays'] == 'customer_charge'){
            $request['payment_operator'] = null;
        }

        $stay->update($request->all());

        return redirect()->route('stays.index')->with('status','Estancia actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stay  $stay
     * @return \Illuminate\Http\Response
     */
    public function destroy(stay $stay)
    {
        $stay=Stay::findOrFail($stay->id);

        $stay->delete();

        return redirect()->route('stays.index')->with('status','Eliminado con exito');
    }
}
