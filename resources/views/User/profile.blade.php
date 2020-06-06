@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container-fluid">
  @if (session('status'))
    <div class="row">
      <div class="col-md-10">
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>Exito</h5>
          <p>{{ session('status') }}</p>
        </div>
      </div>
    </div>
  @endif
  <div class="row">
    <div class="col-lg-7">
      <!-- card -->
        
      <!-- /card -->


      <div class="card ">
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
                  @error('name')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            
            <!--phone -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">{{ __('Telfono') }}</label>
                  <input class="form-control" type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"/>
                  @error('phone')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <!--email -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">{{ __('Correo') }}</label>
                  <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}"/>
                  @error('email')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
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
              <!--position -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="position">{{ __('Puesto') }}</label>
                  <input class="form-control" type="text" id="position" name="position" value="{{ old('position', $user->position) }}"/>
                  @error('position')
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
      <div class="card ">
       <div class="card-header" style="background-color:#343a40; color: white">
         <h2 class="card-title">{{ __('Imagen de perfil') }}</h2>
       </div>
       <div class="card-body">
        <div class="row">
          <div class="col d-flex justify-content-center">
            <div id="avatar-box" style="background-image:url('{{$user->get_image}}')">
            </div>
          </div>
        </div>
        <form action="{{route('profile.avatar')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col mt-4">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="avatar" name="avatar">
                  <label class="custom-file-label" for="avatar">{{__('Seleccionar imagen')}}</label>
                </div>
              </div>
              @error('avatar')
                <small class="mt-0" style="color:red">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
          </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
@endsection
