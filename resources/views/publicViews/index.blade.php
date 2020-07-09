@extends('layouts.base')
@section('content')
<!-- Start Main -->
<main id="main" style="background-image: url(images/barco.jpg);">
  <div class="container">

    <div class="row">
      <div class="col">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
      </div>
    </div>
    <div class="row align-items-center" id="main-row">
      <div class="col-lg-6" id="main-text">
        <h1>
          <b>S</b>istema <br>
          <b>I</b>ntermodar de <br>
          <b>R</b>eservaciones.  
        </h1>
        <h3>Realiza tus cotizaciones</h3>
        <h4>Por mar, tierra y aire con las con las empreasas que tenemos registradas.</h4>
      </div>
      <div class="col-lg-6 ">
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
              <label for="type-Load">Tipo de carga</label>
              <select class="custom-select" id="type-Load" name="tpye_equipment">
                <option value="Dry Box" selected>{{__('Caja Seca')}}</option>
                <option value="Refrigerated">{{__('Caja Refrigerada')}}</option>
                <option value="Plataform">{{__('Plataforma')}}</option>
                <option value="Container">{{__('Contenedor')}}</option>
                <option value="Box">{{__('Caja')}}</option>
                <option value="Package">{{__('Bulto')}}</option>
                <option value="Pallet">{{__('Pallet')}}</option>
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
<div class="container" id="information">
  <div class="row mt-5">
    <div class="col-md-7 d-flex flex-column justify-content-center ">
      <h3 class="mb-4">Quienes somos:</h3>
      <p class="text-justify">Somos una compaña que ofrece servicio online de reservaciones para envíos de mercancía en todo México y Latinoamérica, con un equipo de expertos que te acompañará en todo momento. Recibirás ayuda comercial y operativa especializada a lo largo de todo el proceso de importación o exportación de tu mercancía.</p>
    </div>
    <div class="col-md mt-2">
      <img src="{{asset('images/contenedores.jpg')}}" class="img-fluid image">
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-7 d-flex flex-column justify-content-center order-md-2">
      <h3>Con tecnología SIR:</h3>
      <p class="text-justify">SIR es la plataforma web disruptiva con la que los importadores y exportadores comparan tarifas en tiempo real, con SIR hace posible la reserva integral de envíos comerciales en pocos minutos, sin necesidad de esperar días o semanas por una cotización.</p>
      <p class="text-justify">
        Gestionar con éxito la compleja cadena de transporte internacional exige no sólo tecnología, sino un gran equipo de profesionales de la logística.
      </p>
      <p class="text-justify">Ellos están al otro lado de nuestra plataforma, asesorando y gestionando cada envío para garantizar que sea rentable, seguro y eficiente.</p>
    </div>
    <div class="col-md order-md-1 mt-2">
      <img src="{{asset('images/camion.jpg')}}" class="img-fluid image">
    </div>
  </div>
</div>

<div class="container" id="info-user">
    <h2 class="text-center mt-5">Escoge tu tipo de usuario.</h2>
    <div id="cuadro"></div>
  <div class="row mt-4">
    <div class="col-sm">
      <div class="card-body">
        <h5 class="card-title text-center">Shipper <br><small style="color:gray">Persona o empresa exportador</small></h5>
        <ul>
          <li>Realiza cotizaciones en tiempo real</li>
          <li>Encuentra la mejor tarifa para tu empresa</li>
          <li>Cotiza transporte terrestre en camión, tren</li>
          <li>Cotiza transporte aéreo</li>
          <li>Cotiza transporte marítimo</li>
          <li>Empresas certificadas (C-TPAT /OEA)</li>
        </ul>
      </div>
    </div>
    <div class="col-sm">
      <div class="card-body">
        <h5 class="card-title text-center">Transportista</h5>
        <ul class="m-top">
          <li>Encuentra empresas exportadoras seguras</li>
          <li>Incrementa tu cartera de clientes</li>
          <li>Ofrece tus tarifas en tiempo real</li>
          <li>Somos tu agente de ventas</li>
          <li>Convierte tu empresa en una empresa calificada</li>
        </ul>
      </div>
    </div>
    <div class="col-sm">
      <div class="card-body">
        <h5 class="card-title text-center">Broker</h5>
        <ul class="m-top">
          <li>Encuentra empresas certificadas (C-TPAT /OEA)</li>
          <li>Incrementa tu cartera de clientes</li>
          <li>Ofrece tus tarifas en tiempo real</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    @auth

    @else
      <a href="{{ route('register') }}" class="btn btn-SIR col-sm-3" style="width: 70%">Registrate</a>
    @endauth
  </div>
</div>


<!-- START NEWS -->
<div class="container container-news">
  <div class="row text-center">
      <div class="col">
        <h2>{{__('Últimas noticias')}}</h2>
        <div id="cuadro"> </div>
      </div>
    </div>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row justify-content-center">
          @for ($i = 0; $i < count($posts); $i++)
            @if($i > 2)
              @continue
            @endif
            @include('publicViews.cards.post')
          @endfor 
        </div>
      </div>
      @if(count($posts) > 3)
      <div class="carousel-item">
        <div class="row justify-content-center">
          @for ($i = 0; $i < count($posts); $i++)
            @if($i < 3 || $i > 5 )
              @continue
            @endif
            @include('publicViews.cards.post')
          @endfor 
        </div>
      </div>
      @endif
      @if(count($posts) > 6)
      <div class="carousel-item">
        <div class="row justify-content-center">
          @for ($i = 0; $i < count($posts); $i++)
            @if($i < 6)
              @continue
            @endif
            @include('publicViews.cards.post')
          @endfor 
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="row align-items-center" >
      <div class="col text-center">
        <a class="button-carousel-left btn-SIR" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <img src="{{asset('images/logos/flecha.png')}}">
        </a>
      </div>
      <div class="col text-center">
        <a class="button-carousel-rigth btn-SIR" href="#carouselExampleIndicators" role="button" data-slide="next">
          <img src="{{asset('images/logos/flecha.png')}}" class="rotate">
        </a>
      </div>
  </div>
</div>
<!-- End NEWS -->
@endsection
@section('scripts')
<script src="{{asset('js/countries.js')}}" ></script>
@endsection
