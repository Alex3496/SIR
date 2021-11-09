<div class="card card-warning ">
  <div class="card-header" data-card-widget="collapse">
    <h2 class="card-title">{{ __('Información de la compañia') }}</h2>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"> </i>
      </button>
    </div>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => ['admin.updateCompany',$userToEdit], 'method' => 'PUT']) !!}
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('type_company_user', 'Tipo de Compañia') !!}
        {!! Form::text('type_company_user',$userToEdit->type_company_user,['class' =>'form-control', 'disabled' =>'']) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('usdot', 'DOT') !!}
        {!! Form::text('usdot',$userToEdit->usdot,['class' =>'form-control',]) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('mc_mx', 'Número MC / MX') !!}
        {!! Form::text('mc_mx',$userToEdit->mc_mx,['class' =>'form-control',]) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('company_name', 'Nombre') !!}*
        {!! Form::text('company_name',$userToEdit->company_name,['class' =>'form-control']) !!}
        @error('company_name')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col">
        {!! Form::label('company_address', 'Dirección') !!}*
        {!! Form::text('company_address',$userToEdit->company_address,['class' =>'form-control']) !!}
        @error('company_address')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('country', 'País') !!}*

        {!! Form::select('country',$countries,$userToEdit->country ?? 'MX',['class' =>'form-control']) !!}
        @error('country')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
        {!! Form::label('state', 'Estado') !!}*
        {!! Form::select('state', $states , $userToEdit->state , ['class' =>'form-control']) !!}
        @error('state')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('city', 'Ciudad') !!}*
        {!! Form::text('city',$userToEdit->city,['class' =>'form-control']) !!}
        @error('city')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {!! Form::label('zip_code', 'Código postal') !!}*
        {!! Form::text('zip_code',$userToEdit->zip_code,['class' =>'form-control']) !!}
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
