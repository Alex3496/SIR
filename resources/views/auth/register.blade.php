@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center">{{ __('Registrate') }}</h3>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Type company -->
            <div class="form-group row">
              <label for="type_company_user" class="col-md-4 col-form-label text-md-right">Tipo de Empresa</label>
              <div class="col-md-6">
                <select class="custom-select form-control" name="type_company_user" id="type_company_user">
                  <option value="Carrier/Transport">Carrier / Transporte</option>
                  <option value="BulkingAgent">Agente de carga</option>
                  <option value="ImportExport">Empresa: Importacion / Exportacion</option>
                </select>
              </div>
            </div>
             <!--Name-->
            <div class="form-group row">
              <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Empresa') }}</label>
              <div class="col-md-6">
                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required/>

                @error('company_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

              </div>
            </div>
            <!--Name-->
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

              </div>
            </div>
            <!--email-->
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--password-->
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--password II-->
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
              </div>
            </div>

             <!--telephone-->
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
              <div class="col-md-6">
                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete=""/>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--button register-->
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
