@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center mb-4 mt-4">{{ __('Restablecer contraseña') }}</h3>
          @if (session('status'))
          <div class="alert alert-success" role="alert">{{ __('Se ha enviado a tu correo un enlace para resetear tu contraseña') }}</div>
          @endif
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group row justify-content-center">
              <div class="col-md-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('Correo')}}" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0 justify-content-center">
              <div class="col-md-8 offset-md-2">
                <button type="submit" class="btn btn-primary">{{ __('Enviar link restablacer contraseña') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
