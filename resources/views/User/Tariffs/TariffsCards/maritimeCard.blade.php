@extends('User.Tariffs.tariffsBase')
@section('tariffCard')
<div class="row">
  <div class="col-md-10 ">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($tariffToUpdate))
          {{ __('Editar Tarifa') }}
          @else
          {{ __('Añadir Tarifa : Maritimo') }}
          @endif
        </h3>
      </div>
      <div class="card-body">
        @if(isset($tariffToUpdate))
        {!! Form::open(['route' =>['tariffs.update', $tariffToUpdate->id], 'method' =>'PUT']) !!}
        @else
        {!! Form::open(['route' =>'tariffs.store']) !!}
        @endif
        <input type="hidden" id="type_tariff" name="type_tariff" value="MARITIME"/>
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
              {!! Form::text('origin',$tariffToUpdate->origin ?? '',['class' =>'form-control','autocomplete' => 'off']) !!}
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
          <div class="form-group col-md-4">
            {!! Form::label('type_equipment','Tipo de equipo *') !!}
            <div class="input-group-sm">{{ Form::select('type_equipment',[
              'Container 20 ft' =>'Contenedor 20 pies',
              'Container 40 ft' =>'Contenedor 40 pies',
              'Container 40 ft High cube' =>'Contenedor 40 pies High cube'], 
              $tariffToUpdate->type_equipment ?? '',['class' =>'form-control']) }}
            </div>
            @error('type_equipment')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-md-2">
            {!! Form::label('rate','Tarifa') !!} *
            <div class="input-group-sm">
              {!! Form::text('rate',$tariffToUpdate->rate ?? '',['class' =>'form-control','autocomplete' => 'off']) !!}
            </div>
            @error('rate')
            <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group col-md-2">
            {!! Form::label('currency','Moneda') !!} *
            <div class="input-group-sm">
              {!! Form::select('currency',['MXN' => 'MXN', 'USD' => 'USD'],$tariffToUpdate-> currency ?? '',['class' => 'form-control']) !!}
            </div>
            @error('currency')
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
      </div>
    </div>
  </div>
</div>
@endsection
