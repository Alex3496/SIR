<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PetitionRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewLocationMessage;
use Illuminate\Support\Facades\Mail;
use App\{Petition,Location};

use CountryState;


class PetitionController extends Controller
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

		$petitions = Petition::where('user_id',$user->id)->paginate(15);

		return view('User.Petitions.index',[
			'user'=>$user,
			'petitionToUpdate' => null,
			'countries' => $this->getCountries(),
			'states' => $this->getStates('MX'),
			'petitions' => $petitions,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PetitionRequest $request)
	{
		$request['user_id'] = Auth::user()->id;
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

        $petition = Petition::create($request->all());

        $this->storeLocation($request['origin'],$request['origin_state'],$request['origin_country']);
        $this->storeLocation($request['destiny'],$request['destiny_state'],$request['destiny_country']);

        return redirect()->route('petitions.index')->with('status', 'Agregado con exito');

		dd($request->all());
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
        $petitionToUpdate=Petition::findOrFail($id);
        
        //asegura se la peticion pertenece al usuario
        $this->authorize('pass',$petitionToUpdate);

        //carga informacion de los paises y los estados del pais de la peticion
        $countries = $this->getCountries();
        $states_origin = CountryState::getStates($petitionToUpdate->origin_country);
        $states_destiny = CountryState::getStates($petitionToUpdate->destiny_country);

        return view('User.Petitions.index',[
                'user'=>$user,
                'petitionToUpdate' => $petitionToUpdate,
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
	public function update(PetitionRequest $request, $id)
	{
		$petitionToUpdate=Petition::findOrFail($id);

		//asegura se la tarifa pertenece al usuario
        $this->authorize('pass',$petitionToUpdate);

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

        $petitionToUpdate->update($request->all());

        $this->storeLocation($request['origin'],$request['origin_state'],$request['origin_country']);
        $this->storeLocation($request['destiny'],$request['destiny_state'],$request['destiny_country']);

        return redirect()->route('petitions.index')->with('status', 'Editado con Exito'); 

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$PetitionToDelete = Petition::findOrFail($id);

        $this->authorize('pass',$PetitionToDelete); 

        $PetitionToDelete->delete();

        return redirect()->route('petitions.index')->with('status', 'Eliminado con exito');
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
   *Retorna un array con los estados de un pais
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
