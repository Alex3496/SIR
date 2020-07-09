@extends('layouts.base')

@section('content')
<div  id="contact" class="container">
  <div class="row" >
    <div class="col text-center">
      <h2>Contáctanos</h2>
      <div id="cuadro">
      </div>
    </div>
  </div>
  <div class="row" >
    <div class="col-md-6 offset-md-3">
      <p class="text-center">
        ¿Tienes alguna duda o pregunta? No dudes en contactarnos o puedes enviarnos un mensaje con tu información de contacto, junto con un mensaje explicando tu situación y nosotros te responderemos en la brevedad posible.
      </p>
    </div>
  </div>
  <div class="row text-center mt-5" >
    <div class="col-md-4 ">
      <img src="{{asset('images/logos/tel.png')}}" alt="telephone">
      <p>+52-664-440-2028</p>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/logos/gps.png')}}" alt="telephone">
      <div>Baja Malibu 4065 Col. Loma Bonita, CP. 22200 Tijuana B.C. México</div>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/logos/mail.png')}}" alt="telephone">
      <p>info@ibookingsystem.com</p>
    </div>
  </div> 
</div>

<div class="container" id="messageArea">
  <div class="row">
    <div class="col-md-8">



      {!! Form::open(['route' => 'infomation.send', 'method' => 'GET']) !!}
        <div class="form-group row">
          <div class="col-md-6">
            {!! Form::label('name','Nombre *') !!}
            {!! Form::text('name',null,['class' => 'form-control','autocomplete' => 'off']) !!}
            @error('name')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6">
            {!! Form::label('lastName','Apellido *') !!}
            {!! Form::text('lastName',null,['class' => 'form-control','autocomplete' => 'off']) !!}
            @error('lastName')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            {!! Form::label('email','Correo *') !!}
            {!! Form::email('email',null,['class' => 'form-control']) !!}
            @error('email')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6">
            {!! Form::label('phone','Teléfono') !!}
            {!! Form::text('phone',null,['class' => 'form-control','autocomplete' => 'off']) !!}
            @error('phone')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-8">
            {!! Form::label('message','Mensaje *') !!}
            {!! Form::textarea('message',null,['class' => 'form-control', 'rows' => 5,'autocomplete' => 'off']) !!}
            @error('message')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-8">
            <button type="submit" class="btn btn-SIR ml-auto">
              {{ __('Enviar') }}
            </button>
          </div>
        </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>
@endsection