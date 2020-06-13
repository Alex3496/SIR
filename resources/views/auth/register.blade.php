@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center mb-4">{{ __('Registrate') }}</h3>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Type company -->
            <div class="row justify-content-center form-group">
              <div class="col-md-4 text-md-right">
                <label class="mr-3 pt-2">Tipo de Cuenta</label>
              </div>
              <div class="col-md-7 d-flex align-items-center justify-content-left">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_company_user" id="Shipper" value="Shipper" checked {{ (old('type_company_user') == 'Shipper') ? 'checked' : '' }}/>
                  <label class="form-check-label" for="Shipper">Shipper</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_company_user" id="Carriers" value="Carriers" {{ (old('type_company_user') == 'Carriers') ? 'checked' : '' }}/>
                  <label class="form-check-label" for="Carriers">Trasnportista</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_company_user" id="Broker" value="Broker" {{ (old('type_company_user') == 'Broker') ? 'checked' : '' }}/>
                  <label class="form-check-label" for="Broker">Broker</label>
                </div>
              </div>
            </div>
            <!--Company Name-->
            <div class="form-group row justify-content-center" id="company_name">
              <div class="col-md-9">
                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" placeholder="{{ __('Nombre de la Empresa') }}"/>
                @error('company_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--position-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required placeholder="{{ __('Puesto') }}"/>
                @error('position')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--Name-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Nombre Completo') }}"/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--telephone-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{ old('phone') }}" autocomplete="" placeholder="{{ __('Telefono') }}"/>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--email-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Correo') }}"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--password-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Contraseña') }}"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--password II-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmar Contraseña') }}"/>
              </div>
            </div>
            <!--button register-->
            <div class="form-group row justify-content-center">
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Registrar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection
