@extends('layouts.base')

@section('content')
    <!-- Start Main -->

  <main id="main" style="background-image: url(images/barco.jpg);" >
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6">
          <h1>
            Realiza tus cotizaciones
          </h1>
          <h4>
            Por mar, tierra y aire con las empresas REGISTRADAS EN NUESTRO SITIO
          </h4>
        </div>
        <div class="col-12 col-lg-6">
          <div id="quote-card" >
            <form>

              <div class="route-item btn-group btn-group-toggle"  data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="options" id="option1" checked> Terrestre
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" id="option2"> Marítimo
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" id="option3"> Aereo
                </label>
              </div>

              <div class="form-group">
                <label for="origin">Origen</label>
                <input type="text" class="form-control" id="origin" placeholder="Pais, Ciudad, Puerto">
              </div>

              <div class="form-group">
                <label for="destination">Destino</label>
                <input type="text" class="form-control" id="destination" placeholder="Pais, Ciudad, Puerto">
              </div>

              <div class="form-group">
                <label for="send-date">Fecha de envío</label>
                <input type="date" class="form-control" id="send-date">
              </div>

              <div class="form-group">
                <label for="type-Load">Tipo de carga</label>
                <select class="custom-select" id="type-Load">
                  <option value="LCL" selected >LCL</option>
                  <option value="FLC">FLC</option>
                  <option value="BULK">BULK</option>
                </select>
              </div>

              <button type="submit" class="btn btn-SIR" id="btn-quote">Cotizar</button>
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
          <div id="cuadro">
          </div>
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