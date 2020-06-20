@extends('layouts.base')
@section('content')
<!-- Start Main -->
<main id="main" style="background-image: url(images/barco.jpg);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-6">
        <h1>Realiza tus cotizaciones</h1>
        <h4>Por mar, tierra y aire con las empresas REGISTRADAS EN NUESTRO SITIO</h4>
      </div>
      <div class="col-12 col-lg-6">
        <div id="quote-card">
          <form action="{{ route('tariffsResults') }}" method="GET">
            @csrf
            <div class="col d-flex justify-content-center mb-2 mt-0">
              <div class="route-item btn-group btn-group-toggle"  data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="type_tariff" checked="" value="TRUCK" />
                  {{ __('Camión') }}
                </label>
                <label class="btn btn-secondary active">
                  <input type="radio" name="type_tariff" value="TRAIN" />
                  {{ __('Tren') }}
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="type_tariff" value="MARITIME" />
                  {{ __('Marítimo') }}
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="type_tariff" value="AERIAL" />
                  {{ __('Aéreo') }}
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="origin">{{ __('Origen') }}</label>
              <input list="locations-origin" type="text" class="form-control" 
              id="origin-user" name="location_origin" placeholder="Pais, Ciudad, Puerto" autocomplete="off"/>
              <datalist id="locations-origin"> </datalist>
              @error('location_origin')
                <small class="mt-0" style="color:red">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="destiny">{{ __('Destino') }}</label>
              <input list="locations-destiny" type="text" class="form-control" 
              id="destiny-user" name="location_destiny" placeholder="Pais, Ciudad, Puerto" autocomplete="off"/>
              <datalist id="locations-destiny"> </datalist>
              @error('location_destiny')
                <small class="mt-0" style="color:red">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="send-date">Fecha de envío</label>
              <input type="date" class="form-control" id="send-date"/>
            </div>
            <div class="form-group">
              <label for="type-Load">Tipo de carga</label>
              <select class="custom-select" id="type-Load" name="tpye_equipment">
                <option value="LCL" selected>LCL</option>
                <option value="FLC">FLC</option>
                <option value="BULK">BULK</option>
              </select>
            </div>
            <div class="row">
              <div class="col mt-2">
                <button type="submit" class="btn btn-SIR btn-block">{{ __('Cotizar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- End Main -->
<!-- START NEWS -->
<section id="news">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h2>Ultimas noticias</h2>
        <div id="cuadro"> </div>
      </div>
    </div>
    <div class="row text-center">
      <div class="col mt-5 mb-5">
        <h1>No hay noticias</h1>
      </div>
    </div>
  </div>
</section>
<!-- End NEWS -->
@endsection
@section('scripts')
<script src="{{asset('js/countries.js')}}" ></script>
@endsection
