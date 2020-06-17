<div class="card ">
  <div class="card-header" style="background-color:#343a40; color: white" >
    <h2 class="card-title">{{ __('Información de la compañia') }}</h2>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => ['company.update'], 'method' => 'PUT']) !!}
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('type_company_user', 'Tipo de Compañia') !!}
        {!! Form::text('type_company_user',$user->type_company_user,['class' =>'form-control', 'disabled' =>'']) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('company_name', 'Nombre') !!}
        {!! Form::text('company_name',$user->company_name,['class' =>'form-control']) !!}
        @error('company_name')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col">
        {!! Form::label('company_address', 'Dirección') !!}
        {!! Form::text('company_address',$user->company_address,['class' =>'form-control']) !!}
        @error('company_address')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('country', 'País') !!}

        {!! Form::select('country', $countries , $user->country , ['class' =>'form-control']) !!}

        @error('country')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('state', 'Estado') !!}
        {!! Form::select('state', $states , $user->state , ['class' =>'form-control']) !!}
        @error('state')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('city', 'Ciudad') !!}
        {!! Form::text('city',$user->city,['class' =>'form-control']) !!}
        @error('city')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('zip_code', 'Código postal') !!}
        {!! Form::text('zip_code',$user->zip_code,['class' =>'form-control']) !!}
        @error('zip_code')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          {!! Form::submit('Guardar',['class' =>'btn btn-primary btn-block']) !!}
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
