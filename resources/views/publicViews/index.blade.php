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
              <div class="route-item btn-group btn-group-toggle"  data-toggle="buttons" class="radios">
                <label id="radio-truck"  class="btn btn-radio-type-tariff">
                  <input type="radio" name="type_tariff" value="TRUCK" />
                  {{ __('Camión') }}
                </label>
                <label id="radio-train" class="btn btn-radio-type-tariff">
                  <input type="radio" name="type_tariff" value="TRAIN" />
                  {{ __('Tren') }}
                </label>
                <label id="radio-maritime"  class="btn  btn-radio-type-tariff">
                  <input type="radio" name="type_tariff" value="MARITIME" />
                  {{ __('Marítimo') }}
                </label>
                <label id="radio-aerial" class="btn btn-radio-type-tariff">
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

<!-- form track-trace -->
<div class="container-fluid d-flex align-items-center" id="track-trace">

  <div class="container">
     <div>
    <h3>
      Rastrea tu contenedor.
    </h3>
    <p>Selecciona la empresa encargada de tu contenedor y el numero de seguimiento.</p>
  </div>
    <form action="https://connect.track-trace.com/for/panaderia" method="post" target="_blank">
      <div class="row">
        <div class="col-md mt-4">
          <select name="shipper" class="form-control">
              <option value="">Select</option>
              <option value="aircargo">Air Cargo</option>
              <option value="postems">Post/EMS</option>
              <option value="container">Container</option>
              <option value="billoflading">Bill Of Lading</option>
              <option value="aduiepyle">A. Duie Pyle</option>
              <option value="aaacooper">AAA Cooper</option>
              <option value="americanlinehaul">American Linehaul</option>
              <option value="carlile">Carlile</option>
              <option value="centralfreightlines">Central Freight Lines</option>
              <option value="centraltransport">Central Transport</option>
              <option value="cevalogistics">CEVA Logistics</option>
              <option value="clarke">Clarke</option>
              <option value="clearlane">Clear Lane</option>
              <option value="combinedexpress">Combined Express</option>
              <option value="csatransportation">CSA Transportation</option>
              <option value="dayross">Day & Ross</option>
              <option value="daylighttransport">Daylight Transport</option>
              <option value="daytonfreight">Dayton Freight</option>
              <option value="dbschenkerusa">DB Schenker USA</option>
              <option value="dependable">Dependable</option>
              <option value="dhl">DHL</option>
              <option value="dhlgf">DHL G. F. </option>
              <option value="dohrntransfer">Dohrn Transfer</option>
              <option value="doubledexpress">Double D Express</option>
              <option value="dsv">DSV</option>
              <option value="ediexpress">EDI Express</option>
              <option value="estes">Estes</option>
              <option value="fedex">Fedex</option>
              <option value="forwardair">Forward Air</option>
              <option value="hercules">Hercules</option>
              <option value="jpexpress">JP Express</option>
              <option value="kuehnenagel">Kuehne + Nagel</option>
              <option value="landairexpress">Land Air Express</option>
              <option value="lynden">Lynden</option>
              <option value="maldivesports">Maldives Ports</option>
              <option value="manitoulintransport">Manitoulin Transport</option>
              <option value="midwestmotorexpress">Midwest Motor Express</option>
              <option value="newpenn">New Penn</option>
              <option value="olddominion">Old Dominion</option>
              <option value="panther">Panther</option>
              <option value="parcelforce">Parcelforce</option>
              <option value="pittohio">PITT OHIO</option>
              <option value="postnord">Postnord</option>
              <option value="purolator">Purolator</option>
              <option value="quikx">Quik X</option>
              <option value="rlcarriers">R+L Carriers</option>
              <option value="reddaway">Reddaway</option>
              <option value="roadrunner">Roadrunner</option>
              <option value="saia">Saia</option>
              <option value="southeasternfreightlines">Southeastern Freight Lines</option>
              <option value="sterling">Sterling</option>
              <option value="taexpress">TA Express</option>
              <option value="tcs">TCS</option>
              <option value="tnt">TNT</option>
              <option value="total">Total</option>
              <option value="tstcfexpress">TST-CF Express </option>
              <option value="ups">UPS</option>
              <option value="uslogistics">US Logistics</option>
              <option value="usps">USPS</option>
              <option value="vitran">Vitran</option>
              <option value="wardtrucking">Ward Trucking</option>
              <option value="xpologisticsltl">XPO Logistics LTL </option>
              <option value="yrc">YRC</option>
            </select>
        </div>
        <div class="col-md mt-4">
          <input type="text" name="number" class="form-control">
        </div>
        <div class="col-md mt-4">
          <input type="submit" value="Track" class="btn btn-SIR col">
        </div>
      </div>
    </form>
  </div>
  
</div>
<!-- end form track-trace -->

<div class="container" id="information">
  <div class="row mt-5">
    <div class="col-md-7 d-flex flex-column justify-content-center ">
      <h2 class="mb-4">Busca:</h2>
      <p class="text-justify">Encuentre al instante las mejores tarifas de flete marítimo, aéreo y terrestre.</p>
    </div>
    <div class="col-md mt-2 center">
      <img src="{{asset('images/logos/buscar.svg')}}" class="image-info">
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-7 d-flex flex-column justify-content-center ">
      <h2 class="mb-4">Cotiza:</h2>
      <p class="text-justify">No esperes días por una cotización, compáralas y escoge la que mejor se adapte a tus necesidades.</p>
    </div>
    <div class="col-md mt-2 center">
      <img src="{{asset('images/logos/reporte.svg')}}" class="image-info">
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-7 d-flex flex-column justify-content-center ">
      <h2 class="mb-4">Rastrea tu contenedor:</h2>
      <p class="text-justify">Track & Trace: Seguimiento de contenedores en tiempo real
      Rastrear contenedores con nuestro Track & Trace es fácil y rápido gracias a un diseño innovador que te dice paso a paso el estatus de tu contenedor
      Localiza tu contenedor inmediatamente e identifica en qué punto de la cadena se encuentra: recogida, despacho de aduanas o fecha estimada de llegada.</p>
    </div>
    <div class="col-md mt-2 center">
      <img src="{{asset('images/logos/entrega.svg')}}" class="image-info">
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
        <h5 class="card-title text-center">Shipper <br></h5>
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
