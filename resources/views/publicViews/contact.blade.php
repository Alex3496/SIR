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
      <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
        tempor incididunt ut labore et dolore magna aliqua. </p>
    </div>
  </div>
  <div class="row text-center mt-5" >
    <div class="col-md-4 ">
      <img src="{{asset('images/logos/tel.png')}}" alt="telephone">
      <p>1-800-6543-765 1-800-3434-876</p>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/logos/gps.png')}}" alt="telephone">
      <div>2130 Fulton Street, Chicago, IL
        94117-1080 USA</div>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/logos/mail.png')}}" alt="telephone">
      <p>soporte@ibookingsystem.com</p>
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