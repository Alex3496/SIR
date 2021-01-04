@extends('layouts.base')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-4 mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
              <h2>Enviale un mensaje a la empresa transportista.</h2>
              <p>A continuación se muestra la información básica sobre la petición seleccionada.</p>
            </div>
          </div>
          <hr/>
          <div class="row">
            <div class="col-md-8 pr-2">
              <div>
                <small>{{ __('Origen') }}:</small>
                <h2>{{ $petition->origin }}</h2>
                <h5>{{ $petition->get_state_origin }}, {{ $petition->get_country_origin }}</h5>
              </div>
              <hr/>
              <div>
                <small>{{ __('Destino') }}:</small>
                <h2>{{ $petition->destiny }}</h2>
                <h5>{{ $petition->get_state_destiny }}, {{ $petition->get_country_destiny }}</h5>
              </div>
              <hr/>
              <div class="d-flex align-items-center">
                <img src="{{ $petition->user->get_image }}" class="logo-company-tariff-card">
                <div class="ml-4">
                  <small>{{ __('Empresa') }}:</small>
                  <h5>{{ $petition->user->company_name }}</h5>
                </div>
              </div>
              <hr/>
              <div>
                {!! Form::open(['route' => 'booking.sendPetition','method' => 'GET']) !!}
                {!! Form::hidden('id',$petition->id) !!}
                <label>{{ __('Tus datos de contacto') }}</label>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label">{{ __('Nombre') }}*</label>
                  <div class="col-md-5">
                    {!! Form::text('name', Auth::user()-> name , ['class' => 'form-control','required']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="company_name" class="col-md-4 col-form-label">{{ __('Nombre de la empresa') }}*</label>
                  <div class="col-md-5">
                    {!! Form::text('company_name', Auth::user()-> company_name, ['class' => 'form-control','required']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label">{{ __('Correo de contacto') }}*</label>
                  <div class="col-md-5">
                    {!! Form::email('email', Auth::user()-> email, ['class' => 'form-control','required']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone" class="col-md-4 col-form-label">{{ __('Teléfono') }}</label>
                  <div class="col-md-5">
                    {!! Form::text('phone', Auth::user()-> phone ?? '', ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="collection_address" class="col-md-4 col-form-label">{{__('Dirección de Recolección')}}</label>
                  <div class="col-md-5">
                    {!! Form::text('collection_address','', ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="delivery_address" class="col-md-4 col-form-label">{{__('Dirección de Entrega')}}</label>
                  <div class="col-md-5">
                    {!! Form::text('delivery_address','', ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="date" class="col-md-4 col-form-label">{{ __('Fecha de envío') }}</label>
                  <div class="col-md-5">
                    {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control','required']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="message">{{ __('Mensaje') }}</label>
                  {!! Form::textarea('message', '', ['class' => 'form-control','placeholder' => '(Opcional) Puedes enviar más detalles tu empresa', 'rows' => '5' ]) !!}
                </div>
                <div class="form-group">
                  {!!  Form::submit('Enviar',['class' => 'btn btn-SIR col-md-5']); !!}
                </div>
                {!! Form::close() !!}
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-between pr-2" id="info-column">
              <div id="info-inner" class="d-flex flex-column justify-content-around">
                <div  class="d-flex justify-content-center">
                  <h2>${{ $petition->rate }}</h2>
                  <span class="pl-1 pt-2">{{$petition->currency}}</span>
                </div>
                <div class="text-center">
                  <small>{{ __('Tipo de Equipo') }} :</small>
                  <br/>
                  <label>{{ $petition->get_type_equipment }}</label>
                </div>
                <div class="text-center">
                  <small>{{ __('Peso aprox.') }} :</small>
                  <br/>
                  <label>{{ $petition->approx_weight }} {{ $petition->type_weight }}</label>
                </div>
              </div>
              <div class="d-flex justify-content-center mb-3">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
