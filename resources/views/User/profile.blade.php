@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        @if($errors->
        any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"> </i>
            Alert!
          </h5>
          <ul>
            @foreach($errors->all() as $error)
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
          <h2 class="card-title">Profile</h2>
        </div>
        <form action="{{ route('profile.update',$user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            <!-- start form -->
            <div class="row pl-1 pr-1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">{{ __('Name') }}</label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}"/>
                </div>
              </div>
            </div>
            <div class="row pl-1 pr-1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">{{ __('Phone') }}</label>
                  <input class="form-control" type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"/>
                </div>
              </div>
            </div>
            <h4 class="mb-4 mt-4">Company information</h4>
            <div class="col">
              <div class="form-group">
                <label for="company_name">{{ __('Company name') }}</label>
                <input class="form-control" type="tel" id="company_name" name="company_name" value="{{ old('company_name', $user->company_name) }}"/>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="company_address">{{ __('Company Address') }}</label>
                <input class="form-control" type="tel" id="company_address" name="company_address" value="{{ old('company_address', $user->company_address) }}"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">{{ __('City') }}</label>
                <input class="form-control" type="tel" id="city" name="city" value="{{ old('city', $user->city) }}"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="zip_code">{{ __('Postal Code') }}</label>
                <input class="form-control" type="tel" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">{{ __('Country') }}</label>
                <input class="form-control" type="tel" id="country" name="country" value="{{ old('country', $user->country) }}"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="type_company_user">{{ __('Type company') }}</label>
                <input class="form-control" type="tel" id="type_company_user" name="type_company_user" disabled="" value="{{ old('type_company_user', $user->type_company_user) }}"/>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <button class="btn btn-primary float-right" type="submit">{{ __('Save') }}</button>
              </div>
            </div>
            <!-- end form -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
