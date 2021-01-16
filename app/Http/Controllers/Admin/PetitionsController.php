<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//modelos
use App\Petition;

class PetitionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }
    
    /**
     * Muestra todas las peticiones registradas en el sistema
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $user = Auth::user();

        $origin = $request->get('origin');
        $destiny = $request->get('destiny');

        $petitions = Petition::orderby('id','DESC')
                    ->completeOrigin($origin)
                    ->completeDestiny($destiny)
                    ->paginate(15);


        return view('Admin.Petitions.index',[
            'user'=>$user,
            'petitions' => $petitions,
            'origin' => $origin,
            'destiny' => $destiny,
        ]);
    }
}
