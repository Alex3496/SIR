<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Mail\BookingMessage;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\{Tariff,Favorite};

class BookingController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tariff = Tariff::findOrFail($id);

        return view('booking.show',compact('tariff'));
    }


    public function sendMessage(Request $request)
    {

        //validar

        $tariff = Tariff::findOrFail($request->id);

        $user = $request->all();

        Mail::to($tariff->user->email)->send(new BookingMessage($tariff,$user));

        //guardar tarifa relacionado al usuario

        return redirect()->route('home')
            ->with('status','Se ha enviado un mensaje a la empresa, recibiras una respuesta pronto');

    }


    /**
    *   Save the tariff in the "favorites" list (using as pivot table = tariif_user)
    *     
    *    @param $id int id of tariff
    */
    public function saveBooking($id)
    {
        $tariff = Tariff::findOrFail($id);

        Auth::user()->tariffsFav()->syncWithoutDetaching($tariff);

        return redirect()->route('home')->with('status','La tariffa se ha guardado');
    }

     /**
    *   Remove the tariff of the "favorites" list (using as pivot table = tariif_user)
    *     
    *    @param $id int id of tariff
    */
    public function removeBooking($id)
    {
        $tariff = Tariff::findOrFail($id);

        Auth::user()->tariffsFav()->detach($tariff);

        return redirect()->route('home')->with('status','La tariffa se ha removido');
    }
}
