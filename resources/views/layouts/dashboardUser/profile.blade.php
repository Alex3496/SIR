@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header" style="background-color:#343a40; color: white">
          <h2 class="card-title">Profile</h2>
        </div>
        <form action="" method="">
        	@csrf
          <div class="card-body">
            <!-- start form -->
            <div class="row pl-1 pr-1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">{{ __('Name') }}</label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('title', $user->name) }}"/>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="last_name">{{ __('Last name') }}</label>
                  <input class="form-control" type="text" id="last_name" name="last_name"/>	
                </div>
              </div>
            </div>
            <div class="row pl-1 pr-1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">{{ __('Phone') }}</label>
                  <input class="form-control" type="tel" id="phone" name="phone"/>
                </div>
              </div>
            </div>
            <h4 class="mb-4 mt-4">Company information</h4>
            <div class="col">
              <div class="form-group">
                <label for="company_name">{{ __('Company name') }}</label>
                <input class="form-control" type="tel" id="company_name" name="company_name"/>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="company_address">{{ __('Address') }}</label>
                <input class="form-control" type="tel" id="company_address" name="company_address"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">{{ __('Postal code') }}</label>
                <input class="form-control" type="tel" id="city" name="city"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="zip_code">{{ __('City') }}</label>
                <input class="form-control" type="tel" id="zip_code" name="zip_code"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">{{ __('Country') }}</label>
                <input class="form-control" type="tel" id="country" name="country"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="type_company_user">{{ __('Type company') }}</label>
                <input class="form-control" type="tel" id="type_company_user" name="type_company_user" disabled="" placeholder="Company"/>
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
