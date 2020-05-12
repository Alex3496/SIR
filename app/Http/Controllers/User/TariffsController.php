<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Tariff;
use App\Http\Requests\tariffsRequest;

class TariffsController extends Controller
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
     * Show the view for manage the user tariffs
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user=Auth::user();

        $tariffs=Tariff::where('user_id',$user->id)->get();

        return view('User.tariffs',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'tariffToUpdate' => null
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\tariffsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tariffsRequest $request)
    {        
        //dd($request->all());

        if($request->request->get('type_tariff') == 'maritime')
        {
            $user = Tariff::create([
                'user_id' => Auth::user()->id,
                'type_tariff' => $request['type_tariff'],
                'origin' => $request['origin'],
                'destiny' => $request['destiny'],
                'date' => $request['date'],
                'type_equipment' => $request['type_equipment'],
                'rate' => $request['rate'],
                'collection_Address' => $request['collection_Address'],
            ]);
        }
        else
        {
            //Add field user_id to the request array
            $request->request->add(['user_id' => Auth::user()->id]);

            $tariff = Tariff::create($request->all());
        }

        return back()->with('status', 'Agregado con exito');;

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

        $tariffs=Tariff::where('user_id',$user->id)->get();

        $tariffToUpdate=Tariff::where('user_id',$user->id)
                            ->where('id',$id)->first();

        //dd($tariffToUpdate);

        return view('User.tariffs',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'tariffToUpdate' => $tariffToUpdate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tariffsRequest $request, $id)
    {
        $user=Auth::user();

        $tariffToUpdate=Tariff::where('user_id',$user->id)->where('id',$id)->first();
        //dd($tariffToUpdate);                  

        if($request['type_tariff'] == 'maritime')
        {
            $tariffToUpdate->type_tariff=$request['type_tariff'];
            $tariffToUpdate->origin=$request['origin'];
            $tariffToUpdate->destiny=$request['destiny'];
            $tariffToUpdate->date=$request['date'];
            $tariffToUpdate->type_equipment=$request['type_equipment'];
            $tariffToUpdate->rate=$request['rate'];
            $tariffToUpdate->collection_Address=$request['collection_Address'];

            $tariffToUpdate->min_weight=null;
            $tariffToUpdate->max_weight=null;
            $tariffToUpdate->type_weight=null;
            $tariffToUpdate->distance=null;

            $tariffToUpdate->save();

        }
        else
        {
            $tariffToUpdate->update($request->all());
        }

        return redirect()->route('tariffs.index')->with('status', 'Editado con Exito');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tariff $tariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tariff $tariff)
    {
        //dd($tariff);  

        $tariff->delete();

        return redirect()->route('tariffs.index')->with('status', 'Eliminado con exito'); 
    }
}
