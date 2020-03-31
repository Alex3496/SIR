@extends('layouts.base')

@section('content')
<div class="container" id="Us">
  <div class="row">
    <div class="col-12 col-md-6">
      <h2>Nosotros</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
        veniam, quis</p>
        
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
      veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
      commodo consequat. Duis aute irure dolor in</p>
    </div>
    <div class="col-12 col-md-6 center" >
      <img src="{{asset('images/puerto2.jpg')}}" alt="" srcset="">
    </div>
  </div>
</div>
<div id="Us_content" class="container">
  <div class="row">
    <div class="col">
      <h2>Misión</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h2>Visión</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h2>Valores</h2>
      <ul>
        <li>Valor 1</li>
        <li>Valor 2</li>
        <li>Valor 3</li>
      </ul>
    </div>
  </div>
</div>
@endsection