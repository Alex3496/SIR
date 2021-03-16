@extends('layouts.base')
@section('content')
<div class="container-md container-results">
  <div class="row">
    <div class="col">
      <div class="card mt-2 mb-2">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-4 d-flex align-items-center">
              <img src="{{ asset('images/logos/ubicacion.png') }}" class="serch-img"/>
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
              <img src="{{ asset('images/logos/grua.png') }}" class="serch-img" />
              <div class="align-middle ml-1 mt-2">
                Tipo de contenedor:
                <b>{{$dataSearch['tpye_equipment']}}</b>
              </div>
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-center mb-2">
              <a data-toggle="modal" data-target="#serchTariff" class="edit-link">
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
          <div class="col d-flex justify-content-center align-items-center">
            <span>{{$total}} Resultado(s)</span>
          </div>
          <div class="col-10 d-flex justify-content-center align-items-center">
            <h3 class="margin-0">Cargas registradas</h3>
          </div>
        </div>
        <div class="row">
          @if($petitions->count() == 0)
          <div class="col text-center" style="margin-top: 8rem; margin-bottom: 4rem">
            <h2>Lo sentimos, no se encontró ningún resultado.</h2>
            <h4>Prueba introduciendo otros datos.</h4>
          </div>
          @else
          <div class="col">@include('publicViews.cards.ResultPetitions')</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@include('publicViews.modals.search')

@endsection
@section('scripts')
<script src="{{asset('js/countries.js')}}" ></script>
@endsection