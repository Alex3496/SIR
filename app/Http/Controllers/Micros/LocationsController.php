<?php

namespace App\Http\Controllers\Micros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use CountryState;

class LocationsController extends Controller
{
    

	public function  getStates($code)
	{
		$states = CountryState::getStates($code);

		asort($states);

		return $states;
	}

	public function getLocations($code)
	{

		$locations = Location::where('location_complete','LIKE',"$code%")->pluck('location_complete','id');

		return $locations;
	}

}
