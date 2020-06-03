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

     
    public function index()
    {
        
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.menuCards',[
            'user'=>$user,
            'truckTariffs' => $this->getTruckTariffs($user->id),
            'trainTariffs' => $this->getTrainTariffs($user->id),
            'maritimeTariffs' => $this->getMaritimeTariffs($user->id),
            'aerialTariffs' => $this->getAerialTariffs($user->id),
            'tariffToUpdate' => null
        ]);
    }

    public function addTruckTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.truckCard',[
            'user'=>$user,
            'truckTariffs' => $this->getTruckTariffs($user->id),
            'tariffToUpdate' => null
        ]);
    }

    public function addTrainTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.trainCard',[
            'user'=>$user,
            'trainTariffs' => $this->getTrainTariffs($user->id),
            'tariffToUpdate' => null
        ]);
    }

     public function addMaritimeTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.maritimeCard',[
            'user'=>$user,
            'maritimeTariffs' => $this->getMaritimeTariffs($user->id),
            'tariffToUpdate' => null
        ]);
    }

    public function addAerialTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.aerialCard',[
            'user'=>$user,
            'aerialTariffs' => $this->getAerialTariffs($user->id),
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

        if($request->request->get('type_tariff') == 'MARITIME')
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
        else if($request->request->get('type_tariff') == 'AERIAL')
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

        $tariffToUpdate=Tariff::where('user_id',$user->id)
                            ->where('id',$id)->first();

        //dd($tariffToUpdate);
        
        if($tariffToUpdate->type_tariff == 'TRUCK')
        {
            return view('User.Tariffs.TariffsCards.truckCard',[
                'user'=>$user,
                'truckTariffs' => $this->getTruckTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }

        if($tariffToUpdate->type_tariff == 'TRAIN')
        {
            return view('User.Tariffs.TariffsCards.trainCard',[
                'user'=>$user,
                'trainTariffs' => $this->getTrainTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }

        if($tariffToUpdate->type_tariff == 'MARITIME')
        {
            return view('User.Tariffs.TariffsCards.maritimeCard',[
                'user'=>$user,
                'maritimeTariffs' => $this->getMaritimeTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate
            ]);
        }


        if($tariffToUpdate->type_tariff == 'AERIAL')
        {
            return view('User.Tariffs.TariffsCards.aerialCard',[
                'user'=>$user,
                'aerialTariffs' => $this->getAerialTariffs($user->id),
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

        if($request['type_tariff'] == 'MARITIME')
        {
            $tariffToUpdate->type_tariff=$request['type_tariff'];
            $tariffToUpdate->origin=$request['origin'];
            $tariffToUpdate->destiny=$request['destiny'];
            $tariffToUpdate->type_equipment=$request['type_equipment'];
            $tariffToUpdate->rate=$request['rate'];

            $tariffToUpdate->save();

        }
        else if($request['type_tariff'] == 'AERIAL')
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

        return redirect()->route('tariffs.index')->with('status', 'Editado con Exito');
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


    /*-------------------------------------------------------------------------------------*/

    public function getTruckTariffs($user_id)
    {
        return $truckTariffs=Tariff::where('user_id',$user_id)
            ->where('type_tariff','TRUCK')
            ->get();
    }

    public function getTrainTariffs($user_id)
    {
        return $truckTariffs=Tariff::where('user_id',$user_id)
            ->where('type_tariff','TRAIN')
            ->get();
    }

    public function getMaritimeTariffs($user_id)
    {
        return $truckTariffs=Tariff::where('user_id',$user_id)
            ->where('type_tariff','MARITIME')
            ->get();
    }

     public function getAerialTariffs($user_id)
    {
        return $truckTariffs=Tariff::where('user_id',$user_id)
            ->where('type_tariff','AERIAL')
            ->get();
    }
}
