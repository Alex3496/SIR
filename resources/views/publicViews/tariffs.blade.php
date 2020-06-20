@extends('layouts.base')
@section('content')
<div class="container-md">
  <div class="row">
    <div class="col">
      <div class="card mt-2 mb-2">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-4 d-flex align-items-center">
              <img src="{{ asset('images/logos/ubicacion.png') }}" style="max-height: 64px;"/>
              <div class=" text-center-md ml-2 mt-2" style="width: 85%; ">
                <div style="height: 50%">
                  <b>Origen:</b>
                  {{$dataSearch['location_origin']}}
                </div>
                <div class="mt-2">
                  <b>Destino:</b>
                  {{$dataSearch['location_destiny']}}
                </div>
              </div>
            </div>
            <div class="col-md-5 mb-4 d-flex align-items-center">
              <img src="{{ asset('images/logos/grua.png') }}" style="max-height: 64px;"/>
              <div class="align-middle ml-1 mt-2">
                Tipo de contenedor:
                <b>{{$dataSearch['tpye_equipment']}}</b>
              </div>
            </div>
            <div class="col-md-1 d-flex align-items-center mb-2">
              <a href="#" style="color:gray;">
                <u>Editar</u>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card-body">
        <div class="row">
          <div class="col">{{$tariffs->count()}} Resultado(s)</div>
        </div>
        <div class="row">
          <div class="col">@include('publicViews.cards.ResultTariffs')</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
