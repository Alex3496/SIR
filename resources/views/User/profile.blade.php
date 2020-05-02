@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card ">
        @if($errors->
        any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"> </i>
            Alert!
          </h5>
          <ul>
            @foreach($errors->
            all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"> </i>
            Exito
          </h5>
          <p>{{ session('status') }}</p>
        </div>
        @endif
        <div class="card-header" style="background-color:#343a40; color: white">
          <h2 class="card-title">{{ __('Perfil') }}</h2>
        </div>
        <div class="card-body">
          <h4 class="mb-4 mt-2">
            <b>{{ __('Información Personal') }}</b>
          </h4>
          <form action="{{ route('profile.update',$user) }}" method="POST">
            @csrf
            @method('PUT')
            <!--form  start -->
            <!--Name -->
            <div class="row">
              <div class="col-sm-6 ">
                <div class="form-group">
                  <label for="name">{{ __('Nombre') }}</label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}"/>
                </div>
                @error('name')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            
            <!--phone -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">{{ __('Telfono') }}</label>
                  <input class="form-control" type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"/>
                </div>
              </div>
            </div>
            <!--email -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">{{ __('Correo') }}</label>
                  <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}"/>
                </div>
              </div>
            </div>
            
            <h4 class="mb-4 mt-4">
              <b>{{ __('Información de la compañia') }}</b>
            </h4>
              <!--Type company -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="type_company_user">{{ __('Tipo Compañia') }}</label>
                  <input class="form-control" type="text" id="type_company_user" name="type_company_user" disabled="" value="{{ old('type_company_user', $user->type_company_user) }}"/>
                </div>
              </div>
            </div>
              <!--company name -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="company_name">{{ __('Nombre Compañia') }}</label>
                  <input class="form-control" type="text" id="company_name" name="company_name" value="{{ old('company_name', $user->company_name) }}"/>
                </div>
              </div>
            </div>
              <!--position -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="position">{{ __('Puesto') }}</label>
                  <input class="form-control" type="text" id="position" name="position" value="{{ old('position', $user->position) }}"/>
                </div>
              </div>
            </div>
              <!--company address -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="company_address">{{ __('Direccion de la Empresa') }}</label>
                  <input class="form-control" type="text" id="company_address" name="company_address" value="{{ old('company_address', $user->company_address) }}"/>
                </div>
              </div>
            </div>
              <!--city -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="city">{{ __('Ciudad') }}</label>
                  <input class="form-control" type="text" id="city" name="city" value="{{ old('city', $user->city) }}"/>
                </div>
              </div>
            </div>
              <!--Postal Code -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="zip_code">{{ __('Codigo Postal') }}</label>
                  <input class="form-control" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}"/>
                </div>
              </div>
            </div>
              <!--Counrty -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="country">{{ __('País') }}</label>
                  <input class="form-control" type="text" id="country" name="country" value="{{ old('country', $user->country) }}"/>
                </div>
              </div>
            </div>
              <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Save') }}</button>
                </div>
              </div>
            </div>
            <!-- end form -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
