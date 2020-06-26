<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Mail\BookingMessage;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

use App\Tariff;

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

        $tariff = Tariff::find($id);

        return view('booking.show',compact('tariff'));
    }


    public function sendMessage(Request $request)
    {

        //validar

        $tariff = Tariff::find($request->id);

        $user = $request->all();

        Mail::to($tariff->user->email)->send(new BookingMessage($tariff,$user));

        //guardar tarifa relacionado al usuario

        return redirect()->route('home')->with('status','Se ha enviado un mensaje a la empresa, recibiras una respuesta pronto');

    }
}
