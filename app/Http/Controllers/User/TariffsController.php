<?php

namespace App\Http\Controllers\User;

use App\{Tariff,Location};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\tariffsRequest;

use CountryState;

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
            'tariffToUpdate' => null,
            'countries' => $this->getCountries(),
            'states' => $this->getStates('MX'),
        ]);
    }

    public function addTrainTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.trainCard',[
            'user'=>$user,
            'trainTariffs' => $this->getTrainTariffs($user->id),
            'tariffToUpdate' => null,
            'countries' => $this->getCountries(),
            'states' => $this->getStates('MX'),
        ]);
    }

     public function addMaritimeTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.maritimeCard',[
            'user'=>$user,
            'maritimeTariffs' => $this->getMaritimeTariffs($user->id),
            'tariffToUpdate' => null,
            'countries' => $this->getCountries(),
            'states' => $this->getStates('MX'),

        ]);
    }

    public function addAerialTariff()
    {
        $user=Auth::user();

        return view('User.Tariffs.TariffsCards.aerialCard',[
            'user'=>$user,
            'aerialTariffs' => $this->getAerialTariffs($user->id),
            'tariffToUpdate' => null,
            'countries' => $this->getCountries(),
            'states' => $this->getStates('MX'),
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

        $request['user_id'] = Auth::user()->id;

        $request['origin'] = ucwords(strtolower($request->origin));
        $request['destiny'] = ucwords(strtolower($request->destiny)); 
        
        if($request->request->get('type_tariff') == 'MARITIME')
        {
            $tariff = Tariff::create($request->only(['user_id','type_tariff','origin','origin_country',
                'origin_state','destiny','destiny_country','destiny_state','type_equipment','rate','currency']));

        } 
        else if($request->request->get('type_tariff') == 'AERIAL')
        {
            $tariff = Tariff::create($request->all());
          
            //This are not in the fillable array for security reasons
            $tariff->height = $request['height'];
            $tariff->width = $request['width'];
            $tariff->length = $request['length'];

            $tariff->save();

        }
        else
        {
            $tariff = Tariff::create($request->all());
        }

        $this->storeLocation($request['origin'],$request['origin_state'],$request['origin_country']);
        $this->storeLocation($request['destiny'],$request['destiny_state'],$request['destiny_country']);

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
        $tariffToUpdate=Tariff::findOrFail($id);
        
        $this->authorize('pass',$tariffToUpdate);

        $countries = $this->getCountries();
        $states_origin = CountryState::getStates($tariffToUpdate->origin_country);
        $states_destiny = CountryState::getStates($tariffToUpdate->destiny_country);

        
        if($tariffToUpdate->type_tariff == 'TRUCK')
        {
            return view('User.Tariffs.TariffsCards.truckCard',[
                'user'=>$user,
                'truckTariffs' => $this->getTruckTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate,
                'countries' => $countries,
                'states_origin' => $states_origin,
                'states_destiny' => $states_destiny,
            ]);
        }

        if($tariffToUpdate->type_tariff == 'TRAIN')
        {
            return view('User.Tariffs.TariffsCards.trainCard',[
                'user'=>$user,
                'trainTariffs' => $this->getTrainTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate,
                'countries' => $countries,
                'states_origin' => $states_origin,
                'states_destiny' => $states_destiny,
            ]);
        }

        if($tariffToUpdate->type_tariff == 'MARITIME')
        {
            return view('User.Tariffs.TariffsCards.maritimeCard',[
                'user'=>$user,
                'maritimeTariffs' => $this->getMaritimeTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate,
                'countries' => $countries,
                'states_origin' => $states_origin,
                'states_destiny' => $states_destiny,
            ]);
        }


        if($tariffToUpdate->type_tariff == 'AERIAL')
        {
            return view('User.Tariffs.TariffsCards.aerialCard',[
                'user'=>$user,
                'aerialTariffs' => $this->getAerialTariffs($user->id),
                'tariffToUpdate' => $tariffToUpdate,
                'countries' => $countries,
                'states_origin' => $states_origin,
                'states_destiny' => $states_destiny,
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
        $tariffToUpdate=Tariff::findOrFail($id);

        $this->authorize('pass',$tariffToUpdate);
         $request['origin'] = ucwords(strtolower($request->origin));
        $request['destiny'] = ucwords(strtolower($request->destiny));               

        if($request['type_tariff'] == 'MARITIME')
        {

            $tariffToUpdate->update($request->only(['type_tariff','origin','origin_country',
                'origin_state','destiny','destiny_country','destiny_state','type_equipment','rate','currency']));

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
        $this->storeLocation($request['origin'],$request['origin_state'],$request['origin_country']);
        $this->storeLocation($request['destiny'],$request['destiny_state'],$request['destiny_country']);

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

        $tariffToDelete=Tariff::findOrFail($tariff->id);

        $this->authorize('pass',$tariffToDelete); 

        //detach all tariffs of users fav list 
        $tariffToDelete->userfav()->detach();

        $tariffToDelete->delete();

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

    public function getCountries()
    {
        $countries = CountryState::getCountries('spa');
        asort($countries);
        return $countries;
    }

    public function getStates($country)
    {
        return CountryState::getStates('MX');
    }

    /**
    *   Store the locations (origin, destiny) of the tariff
    *   in the Locations table, create if don't exist.
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
        Location::firstOrCreate([
                'city' => $city,'state' => $state,'country' => $country,]
            ,[
                'state_code' => $state_code,
                'country_code' => $country_code,
                'status' => 'PENDING',
                'location_complete' => $locationComplete, 
        ]);

    }
}
