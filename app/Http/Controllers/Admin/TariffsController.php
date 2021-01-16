<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//modelos
use App\Tariff;

class TariffsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');    
    }
    
    /**
     * Muestra todas las tarifas registradas en el sistema
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $user = Auth::user();

        $origin = $request->get('origin');
        $destiny = $request->get('destiny');

        $tariffs = Tariff::orderby('id','DESC')
                    ->completeOrigin($origin)
                    ->completeDestiny($destiny)
                    ->paginate(15);



        return view('Admin.Tariffs.index',[
            'user'=>$user,
            'tariffs' => $tariffs,
            'origin' => $origin,
            'destiny' => $destiny,
        ]);
    }
}
