<div class="row">
	<!-- Nombre -->
	<div class="form-group col-md-6">
		{!! Form::label('name', 'Nombre') !!}
		<div class="input-group-sm">
			{!! Form::text('name',$OperatorToUpdate->name ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('name')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>

	  <!-- Apellidos -->
	  <div class="form-group col-md-6">
		{!! Form::label('last_name', 'Apellidos') !!}
		<div class="input-group-sm">
		  {!! Form::text('last_name',$OperatorToUpdate->last_name ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('last_name')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- Licencia -->
	  <div class="form-group col-md-6">
		{!! Form::label('license', 'Licencia') !!}
		<div class="input-group-sm">
		  {!! Form::text('license',$OperatorToUpdate->license ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('license')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- Visa -->
	  <div class="form-group col-md-6">
		{!! Form::label('visa', 'Visa') !!}
		<div class="input-group-sm">
		  {!! Form::text('visa',$OperatorToUpdate->visa ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('visa')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	   <!-- Fast -->
	  <div class="form-group col-md-6">
		{!! Form::label('fast', 'Fast') !!}
		<div class="input-group-sm">
		  {!! Form::text('fast',$OperatorToUpdate->fast ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('fast')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- Gafete Único -->
	  <div class="form-group col-md-6">
		{!! Form::label('unique_badge', 'Gafete Único') !!}
		<div class="input-group-sm">
			{!! Form::text('unique_badge',$OperatorToUpdate->unique_badge ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('unique_badge')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- R-Control -->
	  <div class="form-group col-md-6">
		{!! Form::label('r_control', 'R-Control') !!}
		<div class="input-group-sm">
		  {!! Form::text('r_control',$OperatorToUpdate->r_control ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('r_control')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	</div>


	<!-- Acepatar -->
	<div class="row mt-4">
	  <div class="col">
		<a class="btn btn-danger btn-block" href="{{ route('operator.index') }}">{{__('Cancelar')}}</a>
	  </div>
	  <div class="col">
		{!! Form::submit('Aceptar',['class' => 'btn btn-success btn-block']); !!}
	  </div>
	</div>
</div>
