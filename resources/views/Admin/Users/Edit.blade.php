@extends('layouts.dashboardAdmin.dashboard')
@section('content')
<section class="container-fluid">


  <h2 class="text-center mb-4">{{ __('Información del usuario ID: ') . $user->id . ' ' . $user->name }}</h2>


  <!-- row -->
  <div class="row">

    <div class="col-md-6">
      <!-- card -->
      <div class="card card-warning collapsed-card">
        <div class="card-header" data-card-widget="collapse">
          <h2 class="card-title">{{ __('Perfil del usuario: ')}}</h2>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-plus"> </i>
            </button>       
          </div>
        </div>
        <div class="card-body">
          <h4 class="mb-4 mt-2"><b>{{ __('Información Personal') }}</b></h4>
          <form action="{{ route('profile.update',$user) }}" method="POST">
            @csrf
            @method('PUT')
            <!--form  start -->

            <div class="row">

              <!--Name -->
              <div class="form-group col-md">
                <label for="name">{{ __('Nombre') }}</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}"/>
                @error('name')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>

              <!--phone -->
              <div class="form-group col-md">
                <label for="phone">{{ __('Telfono') }}</label>
                <input class="form-control" type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"/>
                @error('phone')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>

            </div>
            
            <div class="row">

            <!--email -->
              <div class="form-group col-md-6">
                <label for="email">{{ __('Correo') }}</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}"/>
                @error('email')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>

              <!--position -->
              <div class="form-group col-md-6">
                <label for="position">{{ __('Puesto') }}</label>
                <input class="form-control" type="text" id="position" name="position" value="{{ old('position', $user->position) }}"/>
                @error('position')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>

            </div>
            
            <h4 class="mb-4 mt-4">
              <b>{{ __('Información de la compañia') }}</b>
            </h4>

            <div class="row">
              <!--Type company -->
              <div class="form-group col-md-6">
                <label for="type_company_user">{{ __('Tipo Compañia') }}</label>
                <input class="form-control" type="text" id="type_company_user" name="type_company_user" disabled="" value="{{ old('type_company_user', $user->type_company_user) }}"/>
                @error('type_company_user')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row">
              <!--company name -->
              <div class="form-group col">
                <label for="company_name">{{ __('Nombre Compañia') }}</label>
                <input class="form-control" type="text" id="company_name" name="company_name" value="{{ old('company_name', $user->company_name) }}"/>
                @error('company_name')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row">
            <!--company address -->
              <div class="form-group col">
                <label for="company_address">{{ __('Direccion de la Empresa') }}</label>
                <input class="form-control" type="text" id="company_address" name="company_address" value="{{ old('company_address', $user->company_address) }}"/>
                @error('company_address')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row">
            <!--city -->
              <div class="form-group col-md-6">
                <label for="city">{{ __('Ciudad') }}</label>
                <input class="form-control" type="text" id="city" name="city" value="{{ old('city', $user->city) }}"/>
                @error('city')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row">
            <!--Postal Code -->
              <div class="form-group col-md-6">
                <label for="zip_code">{{ __('Codigo Postal') }}</label>
                <input class="form-control" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}"/>
                @error('zip_code')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row">
            <!--Counrty -->
              <div class="form-group col-md-6">
                <label for="country">{{ __('País') }}</label>
                <input class="form-control" type="text" id="country" name="country" value="{{ old('country', $user->country) }}"/>
                @error('country')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Actualizar') }}</button>
                </div>
              </div>
            </div>
            <!-- end form -->
          </form>
        </div>
      </div>
      <!-- /card -->

      <!-- card -->
      <div class="card card-warning collapsed-card">
        <div class="card-header" data-card-widget="collapse">
           <h2 class="card-title">{{ __('Certificado de seguro') }}</h2>
           <div class="card-tools">
            <button type="button" class="btn btn-tool" 
              data-card-widget="collapse">
              <i class="fas fa-plus"> </i>
            </button>       
          </div>
        </div>
        <div class="card-body">
          <!--form-->
          <form action="{{ route('profile.insuranceStore')}}" method="POST">
            @csrf

            <!--name_insurance -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="name_insurance">{{ __('Nombre de agencia') }}</label>
                  <input class="form-control" type="text" id="name_insurance" name="name_insurance" value="{{ old('name_insurance', $insurance->name_insurance ?? '') }}"/>
                  @error('name_insurance')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--contact_name -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="contact_name">{{ __('Nombre contacto') }}</label>
                  <input class="form-control" type="text" id="contact_name" name="contact_name" value="{{ old('contact_name', $insurance->contact_name ?? '') }}"/>
                  @error('contact_name')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <h4 class="mb-4 mt-2">
              <b>{{ __('Cobertura') }}</b>
            </h4>

            <div class="form-check mb-2 ml-2">
              <input class="form-check-input" type="checkbox" value="1" 
                name="general_liability_ins" 
                id="general_liability_ins"
                @if(isset($insurance->general_liability_ins) && $insurance->general_liability_ins == 1)
                  checked
                @endif>
              <label class="form-check-label ml-2" for="general_liability_ins">
                <b>{{__('General Liability Insurance')}}</b>
              </label>
            </div>

            <div class="form-check mb-2 ml-2">
              <input class="form-check-input" type="checkbox" value="1" 
                name="commercial_general_liability" 
                id="commercial_general_liability"
                @if(isset($insurance->commercial_general_liability) && $insurance->commercial_general_liability == 1)
                  checked
                @endif>
              <label class="form-check-label ml-2" for="commercial_general_liability">
                <b>{{__('Commercial General Liability')}}</b>
              </label>
            </div>

            <div class="form-check mb-2 ml-2">
              <input class="form-check-input" type="checkbox" value="1" 
                name="auto_liability" 
                id="auto_liability"
                @if(isset($insurance->auto_liability) && $insurance->auto_liability == 1)
                  checked
                @endif>
              <label class="form-check-label ml-2" for="auto_liability">
                <b>{{__('Automobile Liability')}}</b>
              </label>
            </div>

            <div class="form-check mb-2 ml-2">
              <input class="form-check-input" type="checkbox" value="1" 
                name="motor_truck_cargo"  
                id="motor_truck_cargo"
                @if(isset($insurance->motor_truck_cargo) && $insurance->motor_truck_cargo == 1)
                  checked
                @endif>
              <label class="form-check-label ml-2" for="motor_truck_cargo">
                <b>{{__('Motor Truck Cargo')}}</b>
              </label>
            </div>

            <div class="form-check mb-5 ml-2">
              <input class="form-check-input" type="checkbox" value="1" 
                name="trailer_interchange" 
                id="trailer_interchange"
                @if(isset($insurance->trailer_interchange) && $insurance->trailer_interchange == 1)
                  checked
                @endif>
              <label class="form-check-label ml-2" for="trailer_interchange">
                <b>{{__('Trailer Interchange')}}</b>
              </label>
            </div>
            <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Actualizar') }}</button>
                </div>
              </div>
            </div>

          </form>
          <!--/form-->
        </div>        
      </div>
      <!-- /card -->

      <!-- card -->
      <div class="card card-warning">
        <div class="card-header" data-card-widget="collapse">
          <h2 class="card-title">{{__('Info basica')}}</h2>  
        </div>
        <div class="card-body">
          <form action="{{ route('admin.users.update',$user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">{{__('Nombre')}}</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}"/>
            </div>

            <div class="form-group">
              <label for="email">{{__('Email')}}</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ old('emial',$user->email) }}"/>
            </div>
            @foreach($roles as $role)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}"
              @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
              <label class="form-check-label" >{{$role->name}}</label>
            </div>
            @endforeach

            <div class="form-group row mt-4">
              <button type="submit" class="btn btn-primary btn-block">{{__('Actualizar')}}</button>
            </div>
            
          </form>
        </div>
      </div>
      <!-- /card -->

    </div>

    <div class="col-md-6">
      <!-- card -->
      <div class="card card-warning collapsed-card">
        <div class="card-header" data-card-widget="collapse">
          <h2 class="card-title">{{ __('Informacion de la compañia') }}</h2>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-plus"> </i>
            </button>       
          </div>
        </div>
        <div class="card-body">
          <!-- START FORM-->
          <form action="{{route('profile.companyStore')}}" method="POST">
            @csrf

            <!--BDA Name -->
            <div class="row">   
              <div class="form-group col-md-7">
                <label for="dba_name">{{ __('Nombre DBA') }}</label>
                <input class="form-control" type="text" id="dba_name" name="dba_name" value="{{ old('dba_name', $dataset->dba_name ?? '') }}"/>
                @error('dba_name')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <!--Scac code -->
            <div class="row">
              <div class="form-group col-md-7">
                <label for="scac_code">{{ __('Código SCAC') }}</label>
                <input class="form-control" type="text" id="scac_code" name="scac_code" value="{{ old('scac_code',$dataset->scac_code ?? '') }}" placeholder="{{__('ej. XXXX')}}" />
                @error('scac_code')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <!--CAAT -->
            <div class="row">
              <div class="form-group col-md-7">
                <label for="caat">{{ __('CAAT') }}</label>
                <input class="form-control" type="text" id="caat" name="caat" value="{{ old('caat',$dataset->caat ?? '') }}"/>
                @error('caat')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <!--mc_number -->
            <div class="row">
              <div class="form-group col-md-7">
                <label for="mc_number">{{ __('Número MC') }}</label>
                <input class="form-control" type="text" id="mc_number" name="mc_number" value="{{ old('mc_number', $dataset->mc_number ?? '') }}"/>
                @error('mc_number')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <!--num_trucks -->
            <div class="row">
              <div class="form-group col-md-7">
                <label for="num_trucks">{{ __('Número de camiones') }}</label>
                <input class="form-control" type="text" id="num_trucks" name="num_trucks" value="{{ old('num_trucks', $dataset->num_trucks ?? '') }}"/>
                @error('num_trucks')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>

             <!--certificate_ctpat -->
            <div class="row">
              <div class="col-md-8">
                <label for="certificate_ctpat">{{ __('Certificación C TPAT') }}</label>
                <div class="form-group row d-flex align-items-center">
                  <div class="col-xl-3 row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasCTPAT" checked="" id="no_ctpat" onchange="disable('certificate_ctpat')" value="off" />
                      <label class="form-check-label" for="no_ctpat">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasCTPAT" 
                      id="yes_ctpat" 
                      onchange="disable('certificate_ctpat')" 
                      value="on" 
                          @if(isset($dataset->certificate_ctpat))
                            checked
                          @endif/>
                      <label class="form-check-label" for="yes_ctpat">{{__('Si')}}</label>
                    </div>  
                  </div>
                  <div class="col mt-2 mt-xl-0">
                  <input class="form-control" type="text" id="certificate_ctpat" name="certificate_ctpat" 
                    value="{{ old('certificate_ctpat', $dataset->certificate_ctpat ?? '') }}" 
                    @if(!isset($dataset->certificate_ctpat))
                      disabled
                    @endif/>
                    @error('certificate_ctpat')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror  
                  </div>
                </div>
              </div>
            </div>

            <!--certificate_oae -->
            <div class="row">
              <div class="col-md-8">
                <label for="certificate_oae">{{ __('Certificación OEA') }}</label>
                <div class="form-group row d-flex align-items-center" >
                  <div class="col-xl-3 row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasOAE" checked="" id="no_OAE" onchange="disable('certificate_oae')" value="off" />
                      <label class="form-check-label" for="no_OAE">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasOAE" id="yes_OAE" onchange="disable('certificate_oae')" value="on"
                        @if(isset($dataset->certificate_oae))
                            checked
                          @endif />
                      <label class="form-check-label" for="yes_OAE">{{__('Si')}}</label>
                    </div>
                  </div>
                  <div class="col mt-2 mt-xl-0">
                    <input class="form-control" type="text" id="certificate_oae" name="certificate_oae" value="{{ old('certificate_oae', $dataset->certificate_oae ?? '') }}"  
                    @if(!isset($dataset->certificate_oae))
                      disabled
                    @endif />
                    @error('certificate_oae')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <!--fast -->
            <div class="row">
              <div class="col-md-8">
                <label for="fast">{{ __('Fast') }}</label>
                <div class="form-group row d-flex align-items-center">
                  <div class="col-xl-3 row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasFast" checked="" id="no_fast" 
                        onchange="disable('fast')"  value="off" />
                      <label class="form-check-label" for="no_fast">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasFast" id="yes_fast" 
                        onchange="disable('fast')" value="on" 
                        @if(isset($dataset->fast))
                          checked
                        @endif/>
                      <label class="form-check-label" for="yes_fast">{{__('Si')}}</label>
                    </div>  
                  </div>
                  <div class="col mt-2 mt-xl-0">
                    <input class="form-control" type="text" id="fast" name="fast" value="{{ old('fast', $dataset->fast ?? '') }}"
                    @if(!isset($dataset->fast))
                      disabled
                    @endif/>
                  @error('fast')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                  </div>
                </div>
              </div>
            </div>

            <h4 class="mb-4 mt-2">
              <b>{{ __('Otros servcios') }}</b>
            </h4>

            <!--warehouse -->
            <div class="row">
              <div class="col-md-8">
                <label for="warehouse">{{ __('Almacen') }}</label>
                <div class="form-group row d-flex align-items-center">
                  <div class="col-xl-3 row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasWarehouse" checked="" id="no_warehouse" 
                      onchange="disable('warehouse')"  value="off" />
                      <label class="form-check-label" for="no_fast">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasWarehouse" id="yes_warehouse" 
                      onchange="disable('warehouse')" value="on" 
                        @if(isset($dataset->warehouse))
                          checked
                        @endif/>
                      <label class="form-check-label" for="yes_fast">{{__('Si')}}</label>
                    </div>
                  </div>
                  <div class="col mt-2 mt-xl-0">
                    <input class="form-control" type="text" id="warehouse" name="warehouse" value="{{   old('warehouse',$dataset->warehouse ?? '') }}" 
                    @if(!isset($dataset->warehouse))
                      disabled
                    @endif/>
                    @error('warehouse')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <!--fiscal_warehouse -->
            <div class="row">
              <div class="col-md-8">
                <label for="fiscal_warehouse">{{ __('Almacen Fiscal') }}</label>
                <div class="form-group row d-flex align-items-center">
                  <div class="col-xl-3 row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasfiscal_warehouse" checked="" 
                      id="no_fiscal_warehouse" 
                      onchange="disable('fiscal_warehouse')"  value="off" />
                      <label class="form-check-label" for="no_fast">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasfiscal_warehouse" id="yes_fiscal_warehouse" 
                      onchange="disable('fiscal_warehouse')" value="on" 
                        @if(isset($dataset->fiscal_warehouse))
                          checked
                        @endif/>
                      <label class="form-check-label" for="yes_fast">{{__('Si')}}</label>
                    </div>
                  </div>
                  <div class="col mt-2 mt-xl-0">
                    <input class="form-control" type="text" id="fiscal_warehouse" name="fiscal_warehouse" 
                    value="{{   old('fiscal_warehouse',$dataset->fiscal_warehouse ?? '') }}" 
                    @if(!isset($dataset->fiscal_warehouse))
                      disabled
                    @endif/>
                    @error('fiscal_warehouse')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group mt-4">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Actualizar') }}</button>
                </div>
              </div>
            </div>
          </form>
          <!-- end form -->
        </div>
      </div>
      <!-- /card -->
    </div>

  </div>
  <!-- /row -->


</section>
@endsection

