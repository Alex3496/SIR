@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div class="card">
  <div class="card-header">
    <h2 class="card-title">{{ __('Crear nuevo usuario') }}</h2>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => 'admin.users.store', 'autocomplete' => 'off']) !!}

    <div class="row mb-3">
      <div class="col-md-4 text-md-right">
        <label>Tipo de Usuario</label>
      </div>
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="form-check form-check-inline">
          {!! Form::radio('role','3',false,['class' =>'form-check-input', 'id' => 'role-0','onclick' => 'show()']) !!}
          {!! Form::label('role-0','Usuario',['class' => 'form-check-label']) !!}
        </div>
        <div class="form-check form-check-inline">
        	{!! Form::radio('role','2',true,['class' =>'form-check-input', 'id' => 'role-1','onclick' => 'hide()']) !!}
          {!! Form::label('role-1','Editor',['class' => 'form-check-label']) !!}
        </div>
        <div class="form-check form-check-inline">
        	{!! Form::radio('role','1',false,['class' =>'form-check-input', 'id' => 'role-2','onclick' => 'hide()']) !!}
          {!! Form::label('role-2','Administrador',['class' => 'form-check-label']) !!}
        </div>
      </div>
    </div>

    <div class="row mb-3" id="TypeCompany" style="display: none;">
      <div class="col-md-4 text-md-right">
        <label>Tipo de Cuenta</label>
      </div>
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="form-check form-check-inline">
          {!! Form::radio('type_company_user','Shipper',true,['class' =>'form-check-input', 'id' => 'type_company_user-0']) !!}
          {!! Form::label('type_company_user-0','Shipper',['class' => 'form-check-label']) !!}
        </div>
        <div class="form-check form-check-inline">
        	{!! Form::radio('type_company_user','Carriers',false,['class' =>'form-check-input', 'id' => 'type_company_user-1']) !!}
          {!! Form::label('type_company_user-1','Trasnportista',['class' => 'form-check-label']) !!}
        </div>
        <div class="form-check form-check-inline">
        	{!! Form::radio('type_company_user','Broker',false,['class' =>'form-check-input', 'id' => 'type_company_user-2']) !!}
          {!! Form::label('type_company_user-2','Broker',['class' => 'form-check-label']) !!}
        </div>
      </div>
    </div>

    <div class="d-flex flex-column align-items-center">
      <div class="form-group col-md-7">
        {!! Form::label('company_name','Nombre la Empresa') !!}
        {!! Form::text('company_name','SIR',['class' => 'form-control']) !!}
        @error('company_name')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
 
      <div class="form-group col-md-7">
        {!! Form::label('position','Puesto') !!}
        {!! Form::text('position','Administrador',['class' => 'form-control']) !!}
        @error('position')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>


      <div class="form-group col-md-7">
        {!! Form::label('name','Nombre Completo') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        @error('name')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>



      <div class="form-group col-md-7">
        {!! Form::label('phone','Telefono') !!}
        {!! Form::text('phone',null,['class' => 'form-control']) !!}
        @error('phone')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>
 
      <div class="form-group col-md-7">
        {!! Form::label('email','Correo electronico') !!}
        {!! Form::email('email','',['class' => 'form-control']) !!}
        @error('email')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>



      <div class="form-group col-md-7">
        {!! Form::label('password', 'Contraseña'); !!}        
        {!! Form::password('password', ['class' => 'form-control','autocomplete' => 'new-password']); !!}
        @error('password')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
      </div>



      <div class="form-group col-md-7">
        {!! Form::label('password_confirmation', 'Confirmar contraseña'); !!}        
        {!! Form::password('password_confirmation', ['class' => 'form-control','autocomplete' => 'new-password']); !!}
        @error('password_confirmation')
          <small class="mt-0" style="color:red">{{ $message }}</small>
        @enderror
        </div>

    </div>
    <div class="row">
      {!! Form::submit('Guardar',['class' => 'btn btn-primary col']); !!}
    </div> 
    {!! Form::close() !!}
  </div>
</div>
