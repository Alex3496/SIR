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

        return view('User.Tariffs.TariffsCards.menuCards',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'tariffToUpdate' => null
        ]);
    }

    public function addTruckTariff()
    {
        $user=Auth::user();

        $tariffs=Tariff::where('user_id',$user->id)->get();

        return view('User.Tariffs.TariffsCards.truckCard',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'tariffToUpdate' => null
        ]);
    }

    public function addTrainTariff()
    {
        $user=Auth::user();

        $tariffs=Tariff::where('user_id',$user->id)->get();

        return view('User.Tariffs.TariffsCards.trainCard',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'tariffToUpdate' => null
        ]);
    }

     public function addMaritimeTariff()
    {
        $user=Auth::user();

        $tariffs=Tariff::where('user_id',$user->id)->get();

        return view('User.Tariffs.TariffsCards.maritimeCard',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'tariffToUpdate' => null
        ]);
    }

    public function addAerialTariff()
    {
        $user=Auth::user();

        $tariffs=Tariff::where('user_id',$user->id)->get();

        return view('User.Tariffs.TariffsCards.aerialCard',[
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
            // way 1 to save
            $tariff = Tariff::create([
                'user_id' => Auth::user()->id,
                'type_tariff' => $request['type_tariff'],
                'origin' => $request['origin'],
                'destiny' => $request['destiny'],
                'type_equipment' => $request['type_equipment'],
                'rate' => $request['rate'],               
            ]);
        } 
        else if($request->request->get('type_tariff') == 'aerial')
        {
            // way 2 to save
            $tariff = new Tariff();

            $tariff->user_id = Auth::user()->id;
            $tariff->type_tariff = $request['type_tariff'];
            $tariff->origin = $request['origin'];
            $tariff->destiny = $request['destiny'];
            $tariff->max_weight = $request['max_weight'];
            $tariff->min_weight = $request['min_weight'];
            $tariff->type_weight = $request['type_weight'];
            $tariff->type_equipment = $request['type_equipment'];
            $tariff->height = $request['height'];
            $tariff->width = $request['width'];
            $tariff->length = $request['length'];
            $tariff->rate = $request['rate'];

            $tariff->save();

        }
        else
        {
            //Add field user_id to the request array
            $request->request->add(['user_id' => Auth::user()->id]);
            //dd($request->all());
            $tariff = Tariff::create($request->all());
        }

        return redirect()->route('tariffs.index')->with('status', 'Agregado con exito');

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
        
        if($tariffToUpdate->type_tariff == 'truck')
        {
            return view('User.Tariffs.TariffsCards.truckCard',[
                'user'=>$user,
                'tariffs' => $tariffs,
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }

        if($tariffToUpdate->type_tariff == 'train')
        {
            return view('User.Tariffs.TariffsCards.trainCard',[
                'user'=>$user,
                'tariffs' => $tariffs,
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }

        if($tariffToUpdate->type_tariff == 'maritime')
        {
            return view('User.Tariffs.TariffsCards.maritimeCard',[
                'user'=>$user,
                'tariffs' => $tariffs,
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }


        if($tariffToUpdate->type_tariff == 'aerial')
        {
            return view('User.Tariffs.TariffsCards.aerialCard',[
                'user'=>$user,
                'tariffs' => $tariffs,
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }

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
            $tariffToUpdate->type_equipment=$request['type_equipment'];
            $tariffToUpdate->rate=$request['rate'];

            $tariffToUpdate->save();

        }
        else if($request['type_tariff'] == 'aerial')
        {
            $tariffToUpdate->update($request->all());

            $tariffToUpdate->distance=null;
            $tariffToUpdate->height=$request['height'];
            $tariffToUpdate->width=$request['width'];
            $tariffToUpdate->length=$request['length'];


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
