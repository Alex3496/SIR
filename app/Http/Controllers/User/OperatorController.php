<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\OperatorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; /*IMPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use Illuminate\Http\Request;

use CountryState;
use App\Operator;

class OperatorController extends Controller
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
        $operators = Operator::where('user_id',$user->id)->paginate(15);

        return view('User.Operator.index',[
            'user'          => $user,
            'operators'     => $operators,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperatorRequest $request)
    {
        $request['user_id'] = Auth::user()->id;

        //poner datos en Mayusculas
        $request['license'] = strtoupper($request['license']);
        $request['visa'] = strtoupper($request['visa']);
        $request['fast'] = strtoupper($request['fast']);
        $request['unique_badge'] = strtoupper($request['unique_badge']);
        $request['r_control'] = strtoupper($request['r_control']);

        $operador = Operator::create($request->all());

        return redirect()->route('operator.index')->with('status','Equipo agregado con exito');

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
        $OperatorToUpdate=Operator::findOrFail($id);
        $this->authorize('pass',$OperatorToUpdate);

        return view('User.Operator.index',[
            'user'=>$user,
            'OperatorToUpdate' => $OperatorToUpdate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperatorRequest $request, $id)
    {
        $OperatorToUpdate=Operator::findOrFail($id);
        $this->authorize('pass',$OperatorToUpdate);

        //poner datos en Mayusculas
        $request['license'] = strtoupper($request['license']);
        $request['visa'] = strtoupper($request['visa']);
        $request['fast'] = strtoupper($request['fast']);
        $request['unique_badge'] = strtoupper($request['unique_badge']);
        $request['r_control'] = strtoupper($request['r_control']);

        $OperatorToUpdate->update($request->all());

        return redirect()->route('operator.index')->with('status','Operador actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator=Operator::findOrFail($id);
        $this->authorize('pass',$operator);

        $operator->delete();

        return redirect()->route('operator.index')->with('status','Eliminado con exito');
    }
}
