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
            {{ __('Editar Tarifa : Camión') }}
          @else
            {{ __('Añadir Tarifa : Camión') }}
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
              	<input type="hidden" id="type_tariff" name="type_tariff" value="TRUCK">
                <div class="col-md">
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

                <div class="col-md">
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

                <div class="col-sm-2 hide">
                  <div class="form-group">
                    <label for="min_weight">{{ __('Peso min.') }}</label>
                    <div class="input-group input-group-sm">
                      <input type="number" class="form-control" id="min_weight" name="min_weight"
                        value="{{ old('min_weight',$tariffToUpdate->min_weight ?? '') }}" />
                    </div>
                    @error('min_weight')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                  
                <div class="col-sm-2 hide">
                  <div class="form-group">
                    <label for="max_weight">{{ __('Peso max.') }}</label>
                    <div class="input-group input-group-sm">
                      <input type="number" class="form-control" id="max_weight" name="max_weight"
                        value="{{ old('max_weight',$tariffToUpdate->max_weight ?? '') }}" />
                    </div>
                   @error('max_weight')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
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
              </div>
              <!--/card row 1-->

              <!--card row 2-->
              <div class="row">

                <div class="col-md-2 hide">
                  <div class="form-group">
                    <label for="distance">{{ __('Millas') }}</label>
                    <div class="input-group input-group-sm">
                      <input type="number" class="form-control" id="distance" name="distance"
                        value="{{ old('distance',$tariffToUpdate->distance ?? '') }}" />
                    </div>
                    @error('distance')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="type_equipment">{{ __('Tipo de equipo') }} *</label>
                    <div class="input-group input-group-sm">
                      <select class="form-control" id="type_equipment" name="type_equipment">
                        <option value="Dry Box 48 ft" @if(old('type_equipment')=='Dry Box 48 ft' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Dry Box 48 ft')
                              selected
                            @endif
                          @endif>
                          {{ __('Caja seca 48 pies') }}
                        </option>
                        <option value="Dry Box 53 ft" @if(old('type_equipment')=='Dry Box 53 ft' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Dry Box 53 ft')
                              selected
                            @endif
                          @endif>
                          {{ __('Caja seca 53 pies') }}
                        </option>
                        <option value="Refrigerated Box 53 ft" @if(old('type_equipment')=='Refrigerated Box 53 ft' )selected @endif 
                        @if(isset($tariffToUpdate)) 
                          @if($tariffToUpdate->type_equipment == 'Refrigerated Box 53 ft')
                            selected
                          @endif
                        @endif>
                          {{ __('Caja Refigerada 53 pies') }}
                        </option>
                        <option value="Plataform 48 ft" @if(old('type_equipment')=='Plataform 48 ft' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Plataform 48 ft')
                              selected
                            @endif
                          @endif>
                          {{ __('Plataforma 48 pies') }}
                        </option>
                        <option value="Plataform 53 ft" @if(old('type_equipment')=='Plataform 53 ft' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Plataform 53 ft')
                              selected
                            @endif
                          @endif>
                          {{ __('Plataforma 53 pies') }}
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