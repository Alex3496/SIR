@extends('User.Tariffs.tariffsBase')
@section('tariffCard')
<div class="row">
  <div class="col-md-10 ">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($tariffToUpdate))
          {{ __('Editar Tarifa : Camión') }}
          @else
          {{ __('Añadir Tarifa : Camión') }}
          @endif
        </h3>
      </div>
      <div class="card-body">
        @if(isset($tariffToUpdate))
        {!! Form::open(['route' =>['tariffs.update', $tariffToUpdate->id], 'method' =>'PUT']) !!}
        @else
        {!! Form::open(['route' =>'tariffs.store']) !!}
        @endif
        <input type="hidden" id="type_tariff" name="type_tariff" value="TRUCK"/>
        <div class="row">
          <div class="form-group col-md">
            {!! Form::label('origin_country', 'Pais origen') !!}
            <div class="input-group-sm">
              {!! Form::select('origin_country', $countries , $tariffToUpdate->origin_country ?? 'MX' , ['class' =>'form-control']) !!}
            </div>
            @error('origin_country')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md">
            {!! Form::label('origin_state', 'Estado origen') !!}
            <div class="input-group-sm">
              {!! Form::select('origin_state', $states_origin ?? [], $tariffToUpdate->origin_state ?? '', ['class' =>'form-control']) !!}
            </div>
            @error('origin_state')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md">
            {!! Form::label('origin', 'Ciudad origen') !!}
            <div class="input-group-sm">
              {!! Form::text('origin',$tariffToUpdate->origin ?? '',['class' =>'form-control', 'autocomplete' => 'off']) !!}
            </div>
            @error('origin')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="form-group col-md">
            {!! Form::label('destiny_country', 'Pais destino') !!}
            <div class="input-group-sm">
              {!! Form::select('destiny_country', $countries , $tariffToUpdate->destiny_country ?? 'MX' , ['class' =>'form-control']) !!}
            </div>
            @error('destiny_country')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md">
            {!! Form::label('destiny_state', 'Estado destino') !!}
            <div class="input-group-sm">
              {!! Form::select('destiny_state', $states_destiny ?? [] , $tariffToUpdate->destiny_state ?? '' , ['class' =>'form-control']) !!}
            </div>
            @error('destiny_state')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md">
            {!! Form::label('destiny', 'Ciudad destino') !!}
            <div class="input-group-sm">
              {!! Form::text('destiny',$tariffToUpdate->destiny ?? '',['class' =>'form-control','autocomplete' => 'off']) !!}
            </div>
            @error('destiny')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="form-group col-md">
            {!! Form::label('approx_weight','Peso estimado *') !!}
            <div class="input-group-sm select-input-container">
              {!! Form::text('approx_weight',$tariffToUpdate->approx_weight ?? '',['class' =>'form-control input-number', 'min' =>0]) !!}
              {!! Form::select('type_weight',['kg' => 'Kg', 'lb' => 'Lb'],$tariffToUpdate-> type_weight ?? '',['class' => 'form-control select-in']) !!}
            </div>
            @error('approx_weight')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
            @error('type_weight')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md">
            {!! Form::label('distance','Distancia') !!}
            <small>Millas</small>
            <div class="input-group-sm">
              {!! Form::number('distance',$tariffToUpdate->distance ?? '',['class' =>'form-control', 'min' =>0]) !!}
            </div>
            @error('distance')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md">
            {!! Form::label('type_equipment','Tipo de equipo *') !!}
            <div class="input-group-sm">{{ Form::select('type_equipment',[
              'Dry Box 48 ft'    => 'Caja seca 48 pies', 
              'Dry Box 53 ft'    => 'Caja seca 53 pies',
              'Refrigerated Box 53 ft'   => 'Caja Refigerada 53 pies',
              'Plataform 48 ft'  => 'Plataforma 48 pies',
              'Plataform 53 ft'  => 'Plataforma 53 pies',
              'Container 20 ft'  => 'Contenedor 20 pies',
              'Container 40 ft'  => 'Contenedor 40 pies',
              'Container 40 ft High cube' => 'Contenedor 40 pies High cube',], 
              $tariffToUpdate->type_equipment ?? '',['class' =>'form-control']) }}
            </div>
            @error('type_equipment')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            {!! Form::label('rate','Tarifa') !!} *
            <div class="input-group-sm select-input-container">
              {!! Form::text('rate',$tariffToUpdate->rate ?? '',['class' =>'form-control input-number','autocomplete' => 'off']) !!}
              {!! Form::select('currency',['MXN' => 'MXN', 'USD' => 'USD'],$tariffToUpdate-> currency ?? '',['class' => 'form-control select-in']) !!}
            </div>
            @error('rate')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
            @error('currency')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group col-md-4">
            {!! Form::label('extra','Mercancia') !!} *
            <div class="input-group-sm">
              {!! Form::text('extra',$tariffToUpdate->extra ?? '',['class' =>'form-control','autocomplete' => 'off', 'maxlength' => '25', 'placeholder' => 'max. 25 caracteres']) !!}
            </div>
            @error('extra')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group col-md-4">
            {!! Form::label('end_date','Disponibilidad hasta:') !!} 
            <div class="input-group-sm">
              {!! Form::date('end_date',$tariffToUpdate->end_date ?? \Carbon\Carbon::now(),['class' => 'form-control']) !!}
            </div>
            @error('end_date')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
  
        </div>

        <div class="row mt-4">
          <div class="col">
            <a class="btn btn-danger btn-block" href="{{ route('tariffs.index') }}">{{ __('Cancelar') }}</a>
          </div>
          <div class="col">
            {!! Form::submit('Aceptar',['class' =>'btn btn-success btn-block']); !!}
          </div>
        </div>
        {!! Form::close() !!}
        <!-- /form -->
      </div>
    </div>
  </div>
</div>
@endsection
