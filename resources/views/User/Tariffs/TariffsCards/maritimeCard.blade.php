@extends('User.Tariffs.tariffsBase')
@section('tariffCard')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div class="row">
	<div class="col-10 ">
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
        <!-- form -->
        @if(isset($tariffToUpdate))
        <form action="{{ route('tariffs.update',$tariffToUpdate->id) }}" method="POST">
        @method('PUT')
        @else
        <form action="{{ route('tariffs.store') }}" method="POST">
        @endif
          @csrf
          <div class="form">
              <!-- card row 1-->
              <div class="row">
              	<input type="hidden" id="type_tariff" name="type_tariff" value="MARITIME">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="origin">{{ __('Origen') }} *</label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" id="origin" name="origin" required
                      value="{{ old('origin',$tariffToUpdate->origin ?? '') }}" />
                    </div>

                    @error('origin')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="destiny">{{ __('Destino') }} *</label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" id="destiny" name="destiny"
                        value="{{ old('destiny',$tariffToUpdate->destiny ?? '') }}" />
                    </div>
                    @error('destiny')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
              <!--/card row 1-->

              <!--card row 2-->
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="type_equipment">{{ __('Tipo de equipo') }} *</label>
                    <div class="input-group input-group-sm">
                      <select class="form-control" id="type_equipment" name="type_equipment">
                        <option value="Container 20 ft" @if(old('type_equipment')=='Container 20 ft' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Container 20 ft')
                              selected
                            @endif
                          @endif>
                          {{ __('Contenedor 20 pies') }}
                        </option>
                        <option value="Container 40 ft" @if(old('type_equipment')=='Container 40 ft' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Container 40 ft')
                              selected
                            @endif
                          @endif>
                          {{ __('Contenedor 40 pies') }}
                        </option>
                        <option value="Container 40 ft High cube" @if(old('type_equipment')=='Container 40 ft High cube' )selected @endif 
                        @if(isset($tariffToUpdate)) 
                          @if($tariffToUpdate->type_equipment == 'Container 40 ft High cube')
                            selected
                          @endif
                        @endif>
                          {{ __('Contenedor 40 pies High cube') }}
                        </option>
                      </select>
                    </div>
                    @error('type_equipment')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="rate">{{ __('Tarifa') }} *<small style="color:gray"> dlls.</small></label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" id="rate" name="rate"
                        value="{{ old('rate',$tariffToUpdate->rate ?? '') }}" />
                    </div>
                    @error('rate')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

              </div>
              <!--/card row 2-->

              <!--card row 3-->
              <div class="row mt-4">
                <div class="col">
                  <a class="btn btn-danger btn-block" href="{{ route('tariffs.index') }}">{{__('Cancelar')}}</a>
                </div>
                <div class="col">
                  <button class="btn btn-success btn-block" type="submit">{{__('Aceptar')}}</button>
                </div>
              </div>
              <!--/card row 3-->
            </div>
          </form>
          <!-- /form -->
        </div>
      </div>
	</div>
</div>
@endsection