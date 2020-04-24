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
        $request->request->add(['user_id' => Auth::user()->id]);
        //dd($request->all());

        $tariff = Tariff::create($request->all());

        return back();

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

        $tariffToUpdate=Tariff::where('user_id',$user->id)
                            ->where('id',$id)->first();
        //dd($tariffToUpdate);                  
        $tariffToUpdate->update($request->all());

        return redirect()->route('tariffs.index');
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
