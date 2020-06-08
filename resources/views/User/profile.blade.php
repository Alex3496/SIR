@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-10">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Exito</h5>
        <p>{{ session('status') }}</p>
      </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i>Alerta</h5>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('errorB'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i>Alerta</h5>
        <p>{{ session('errorB') }}</p>
      </div>
    @endif

    </div>
  </div>


  <div class="row">
    <div class="col-lg-7">

      <!-- profile card -->
        @include('layouts.cards.personalInfo')
      <!-- /card -->


      <div class="card ">
        <div class="card-header" style="background-color:#343a40; color: white">
          <h2 class="card-title">{{ __('Información de la compañia') }}</h2>
        </div>
        <div class="card-body">
          <form action="{{ route('company.update') }}" method="POST">
            @csrf
            @method('PUT')
            <!--form  start -->
            
            <!--Type company -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="type_company_user">{{ __('Tipo Compañia') }}</label>
                  <input class="form-control" type="text" id="type_company_user" name="type_company_user" disabled="" value="{{ old('type_company_user', $user->type_company_user) }}"/>
                  @error('type_company_user')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
              <!--company name -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="company_name">{{ __('Nombre Compañia') }}</label>
                  <input class="form-control" type="text" id="company_name" name="company_name" value="{{ old('company_name', $user->company_name) }}"/>
                  @error('company_name')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
              <!--company address -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="company_address">{{ __('Direccion de la Empresa') }}</label>
                  <input class="form-control" type="text" id="company_address" name="company_address" value="{{ old('company_address', $user->company_address) }}"/>
                  @error('company_address')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
              <!--city -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="city">{{ __('Ciudad') }}</label>
                  <input class="form-control" type="text" id="city" name="city" value="{{ old('city', $user->city) }}"/>
                  @error('city')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
              <!--Postal Code -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="zip_code">{{ __('Codigo Postal') }}</label>
                  <input class="form-control" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}"/>
                  @error('zip_code')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
              <!--Counrty -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="country">{{ __('País') }}</label>
                  <input class="form-control" type="text" id="country" name="country" value="{{ old('country', $user->country) }}"/>
                  @error('country')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
              <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Guardar') }}</button>
                </div>
              </div>
            </div>
            <!-- end form -->
          </form>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3">
      
      @include('layouts.cards.avatar')

    </div>
  </div>
</div>

<!-- Modal -->
  @include('layouts.modals.name')

  @include('layouts.modals.phone')

  @include('layouts.modals.email')

  @include('layouts.modals.password')

  @include('layouts.modals.position')

@endsection
