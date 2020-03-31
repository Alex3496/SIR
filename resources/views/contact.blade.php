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

      <form action="">
        <div class="form-group row">
          <div class="col-md-6">
            <label for="name" class="">Nombre</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-md-6">
            <label for="lastName" class="">Apellido</label>
            <input type="text" class="form-control" name="lastName" id="lastName">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label for="email" class="">Correo</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="col-md-6">
            <label for="phone" class="">Telefono</label>
            <input type="tel" class="form-control" name="phone" id="phone">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-8">
            <label for="message" class="">Mensaje</label>
            <textarea type="text" class="form-control" name="message" id="message" rows="5"> </textarea>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-8">
            <button type="submit" class="btn btn-SIR ml-auto">
              {{ __('Register') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection