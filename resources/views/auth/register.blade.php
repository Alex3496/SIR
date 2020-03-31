@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!--Name-->
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--Last name-->
            <div class="form-group row">
              <label for="LastName" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

              <div class="col-md-6">
                <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror"
                  name="LastName" value="{{ old('LastName') }}" required autocomplete="LastName">

                @error('LastName')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--phone-->
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

              <div class="col-md-6">
                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                  value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--email-->
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--company-->
            <div class="form-group row">
              <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

              <div class="col-md-6">
                <input id="company" type="text" class="form-control @error('email') is-invalid @enderror" name="company"
                  value="{{ old('company') }}" required autocomplete="company">

                @error('company')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--company address-->
            <div class="form-group row">
              <label for="company_address" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

              <div class="col-md-6">
                <input id="company_address" type="text"
                  class="form-control @error('company_address') is-invalid @enderror" name="company_address"
                  value="{{ old('company_address') }}" required autocomplete="company_address">

                @error('company_address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--ZIPcode-->
            <div class="form-group row">
              <label for="ZIPcode" class="col-md-4 col-form-label text-md-right">{{ __('C.P.') }}</label>

              <div class="col-md-6">
                <input id="ZIPcode" type="text" pattern="[0-9]{5}"
                  class="form-control @error('ZIPcode') is-invalid @enderror" name="ZIPcode"
                  value="{{ old('ZIPcode') }}" required autocomplete="ZIPcode">

                @error('ZIPcode')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--city-->
            <div class="form-group row">
              <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

              <div class="col-md-6">
                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                  value="{{ old('city') }}" required autocomplete="city">

                @error('city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!--country-->
            <div class="form-group row">
              <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

              <div class="col-md-6">
                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                  name="country" value="{{ old('country') }}" required autocomplete="country">

                @error('country')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--type_company_user-->
            <div class="form-group row">
              <label for="type_company_user"
                class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Compañia') }}</label>

              <div class="col-md-6">
                <input id="type_company_user" type="text"
                  class="form-control @error('type_company_user') is-invalid @enderror" name="type_company_user"
                  value="{{ old('type_company_user') }}" required autocomplete="type_company_user">

                @error('type_company_user')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--password-->
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!--password II-->
            <div class="form-group row">
              <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
              </div>
            </div>
            <!--button register-->
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection