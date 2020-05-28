@extends('User.Tariffs.tariffsBase')
@section('tariffCard')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div class="row">
	<div class="col-11 ">
		<div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($tariffToUpdate))
            {{ __('Editar Tarifa : Aéreo') }}
          @else
            {{ __('Añadir Tarifa : Aéreo') }}
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
              	<input type="hidden" id="type_tariff" name="type_tariff" value="aerial">
                <div class="col-md">
                  <div class="form-group">
                    <label for="origin">{{ __('Origen') }}</label>
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
                    <label for="destiny">{{ __('Destino') }}</label>
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
                      <input type="number" class="form-control" id="min_weight" min="0" name="min_weight"
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
                      <input type="number" class="form-control" id="max_weight" min="0" name="max_weight"
                        value="{{ old('max_weight',$tariffToUpdate->max_weight ?? '') }}" />
                    </div>
                   @error('max_weight')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                <div class="col-sm-2 d-flex align-items-end hide" >

                  <div class="form-check ml-2 mb-4 hide">
                    <input class="form-check-input" type="radio" name="type_weight" id="kilo" value="kg" checked
                    {{ (old('type_weight') == 'kilo') ? 'checked' : '' }}
                    @if(isset($tariffToUpdate)) 
                      @if($tariffToUpdate->type_weight == 'kg')
                        checked
                       @endif
                    @endif />
                    <label class="form-check-label" for="kilo">Kg.</label>
                  </div>

                  <div class="form-check ml-2 mb-4 hide">
                    <input class="form-check-input" type="radio" name="type_weight" id="pounds" value="lb"  
                    {{ (old('type_weight') == 'pounds') ? 'checked' : '' }}
                    @if(isset($tariffToUpdate)) 
                      @if($tariffToUpdate->type_weight == 'lb')
                        checked
                      @endif
                    @endif/>
                    <label class="form-check-label" for="pounds">Lb.</label>
                  </div>

                  @error('Type_weigh')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror

                </div>
              </div>
              <!--/card row 1-->

              <!--card row 2-->
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    
                    <label for="type_equipment">{{ __('Tipo de equipo') }}</label>

                    <div class="input-group input-group-sm">
                      <select class="form-control" id="type_equipment" name="type_equipment">
                        <option value="Box" @if(old('type_equipment')=='Box' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'Box')
                              selected
                            @endif
                          @endif>
                          {{ __('Caja') }}
                        </option>
                        <option value="Package" @if(old('type_equipment')=='package' )selected @endif
                          @if(isset($tariffToUpdate)) 
                            @if($tariffToUpdate->type_equipment == 'package')
                              selected
                            @endif
                          @endif>
                          {{ __('Bulto') }}
                        </option>
                        <option value="Pallet" @if(old('type_equipment')=='pallet' )selected @endif 
                        @if(isset($tariffToUpdate)) 
                          @if($tariffToUpdate->type_equipment == 'pallet')
                            selected
                          @endif
                        @endif>
                          {{ __('Pallet') }}
                        </option>
                      </select>
                    </div>
                    @error('type_equipment')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="height">{{__('Alto')}}<small style="color:gray"> ft.</small> </label>
                    <div class="input-group input-group-sm">
                      <input type="number"  class="form-control" min="0" max="100" name="height" id="height"
                      value="{{old('height',$tariffToUpdate->height ?? '')}}">
                    </div>
                    @error('height')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="width">{{__('Ancho')}}<small style="color:gray"> ft.</small> </label>
                    <div class="input-group input-group-sm">
                      <input type="number"  class="form-control" min="0" max="100" name="width" id="width"
                      value="{{old('width',$tariffToUpdate->width ?? '')}}">
                    </div>
                    @error('width')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="length">{{__('largo')}}<small style="color:gray"> ft.</small> </label>
                    <div class="input-group input-group-sm">
                      <input type="number"  class="form-control" min="0" max="100" name="length" id="length"
                      value="{{old('length',$tariffToUpdate->length ?? '')}}">
                    </div>
                    @error('length')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
               <!--/card row 2-->

               <!--card row 3-->
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="rate">{{ __('Tarifa') }} <small style="color:gray">dlls.</small></label>
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
              <!--/card row 3-->


              <!--card row 4-->
              <div class="row mt-4">
                <div class="col">
                  <a class="btn btn-danger btn-block" href="{{ route('tariffs.index') }}">{{__('Cancelar')}}</a>
                </div>
                <div class="col">
                  <button class="btn btn-success btn-block" type="submit">{{__('Aceptar')}}</button>
                </div>
              </div>
              <!--/card row 4-->
            </div>
          </form>
          <!-- /form -->
        </div>
      </div>
	</div>
</div>
@endsection