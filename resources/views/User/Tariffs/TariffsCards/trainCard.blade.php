@extends('User.Tariffs.tariffsBase')
@section('tariffCard')
<div class="row">
	<div class="col-xl-10 ">
		<div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($tariffToUpdate))
            {{ __('Editar Tarifa : Tren') }}
          @else
            {{ __('Añadir Tarifa : Tren') }}
          @endif
        </h3>
      </div>

      <div class="card-body">

        @if(isset($tariffToUpdate))
        {!! Form::open(['route' => ['tariffs.update', $tariffToUpdate->id ], 'method' => 'PUT']) !!}
        @else
         {!! Form::open(['route' => 'tariffs.store']) !!}
        @endif
        <input type="hidden" id="type_tariff" name="type_tariff" value="TRAIN">

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
              {!! Form::text('origin',$tariffToUpdate->origin ?? '',['class' => 'form-control','autocomplete' => 'off']) !!}
            </div>
            @error('origin')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

        </div>
        <hr>
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
              {!! Form::text('destiny',$tariffToUpdate->destiny ?? '',['class' => 'form-control','autocomplete' => 'off']) !!}
            </div>
            @error('destiny')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

        </div>
        <hr>
        <div class="row">
          
          <div class="form-group col-md">
            {!! Form::label('approx_weight','Peso estimado *') !!}
            <div class="input-group-sm">
              {!! Form::number('approx_weight',$tariffToUpdate->approx_weight ?? '',['class' => 'form-control', 'min' => 0]) !!}
            </div>
            @error('approx_weight')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

          <div class="col-sm-2 d-flex align-items-end hide" >
            <div class="form-check ml-2 mb-4 hide">
              <input class="form-check-input" type="radio" name="type_weight" id="kg" value="kg" checked
                {{ (old('type_weight') == 'kg') ? 'checked' : '' }}
                  @if(isset($tariffToUpdate)) 
                    @if($tariffToUpdate->type_weight == 'kg')
                      checked
                    @endif
                  @endif />
              <label class="form-check-label" for="kg">Kg.</label>
            </div>
            <div class="form-check ml-2 mb-4 hide">
              <input class="form-check-input" type="radio" name="type_weight" id="lb" value="lb"  
                {{ (old('type_weight') == 'lb') ? 'checked' : '' }}
                  @if(isset($tariffToUpdate)) 
                    @if($tariffToUpdate->type_weight == 'lb')
                      checked
                    @endif
                  @endif/>
              <label class="form-check-label" for="lb">Lb.</label>
            </div>
            @error('Type_weigh')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group col-md">
            {!! Form::label('distance','Distancia') !!}<small> Millas</small>
            <div class="input-group-sm">
              {!! Form::number('distance',$tariffToUpdate->distance ?? '',['class' => 'form-control', 'min' => 0]) !!}
            </div>
            @error('distance')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group col-md">
            {!! Form::label('type_equipment','Tipo de equipo *') !!}
            <div class="input-group-sm">
              {{ Form::select('type_equipment',[
                'Dry Box 53 ft' => 'Caja seca 53 pies',
                'Container 20 ft' => 'Contenedor 20 pies',
                'Container 40 ft' => 'Contenedor 40 pies',
                'Container 40 ft High cube' => 'Contenedor 40 pies High cube'
              ], $tariffToUpdate->type_equipment ?? '',['class' => 'form-control']) }}
            </div>
            @error('type_equipment')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>

        </div> 
        <div class="row">
          <div class="form-group col-md-2">
            {!! Form::label('rate','Tarifa') !!} *
            <div class="input-group-sm">
              {!! Form::text('rate',$tariffToUpdate->rate ?? '',['class' => 'form-control','autocomplete' => 'off']) !!}
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
          
          <div class="form-group col-md-3">
            {!! Form::label('extra','Mercancia') !!} *
            <div class="input-group-sm">
              {!! Form::text('extra',$tariffToUpdate->extra ?? '',['class' =>'form-control','autocomplete' => 'off', 'maxlength' => '25', 'placeholder' => 'max. 25 caracteres']) !!}
            </div>
            @error('extra')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>
  
        </div>

        <div class="row">
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
            <a class="btn btn-danger btn-block" href="{{ route('tariffs.index') }}">{{__('Cancelar')}}</a>
          </div>
          <div class="col">
            {!! Form::submit('Aceptar',['class' => 'btn btn-success btn-block']); !!}
          </div>
        </div>




        {!! Form::close() !!}
        <!-- form -->

        @if(isset($tariffToUpdate))
        <form action="{{ route('tariffs.update',$tariffToUpdate->id) }}" method="POST">
        @method('PUT')
        @else
        <form action="{{ route('tariffs.store') }}" method="POST">
        @endif
          @csrf
        
          </form>
          <!-- /form -->
        </div>
      </div>
	</div>
</div>
@endsection