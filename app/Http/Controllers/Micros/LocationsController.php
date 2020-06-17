<?php

namespace App\Http\Controllers\Micros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use CountryState;

class LocationsController extends Controller
{
    

	public function  getStates($code)
	{
		$states = CountryState::getStates($code);

		asort($states);

		return $states;
	}

}
