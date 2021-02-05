<div class="row">

	<!-- Economic -->
	<div class="form-group col-md-6">
		{!! Form::label('economic', 'Economico') !!}
		<div class="input-group-sm">
			{!! Form::text('economic',$vehicleToUpdate->economic ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('economic')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>

	  <!-- Economic -->
	  <div class="form-group col-md-6">
		
	  </div>

	  <!-- placas US -->
	  <div class="form-group col-md-6">
		{!! Form::label('plates_us', 'Placas US') !!}
		<div class="input-group-sm">
		  {!! Form::text('plates_us',$vehicleToUpdate->plates_us ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('plates_us')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- Estado US -->
	  <div class="form-group col-md-6">
		{!! Form::label('state_us', 'Estado US') !!}
		<div class="input-group-sm">
		  {!!  Form::select('state_us', $states_us, $vehicleToUpdate->state_us ?? null, ['id' => 'plates_us', 'class' => 'custom-select']); !!}
		</div>
		@error('state_us')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	   <!-- placas MX -->
	  <div class="form-group col-md-6">
		{!! Form::label('plates_mx', 'Placas MX') !!}
		<div class="input-group-sm">
		  {!! Form::text('plates_mx',$vehicleToUpdate->plates_mx ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('plates_mx')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- Estado MX -->
	  <div class="form-group col-md-6">
		{!! Form::label('state_mx', 'Estado MX') !!}
		<div class="input-group-sm">
		  {!!  Form::select('state_mx', $states_mx, $vehicleToUpdate->states_mx ?? null, ['id' => 'state_mx', 'class' => 'custom-select']); !!}
		</div>
		@error('state_mx')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- placas MX -->
	  <div class="form-group col-md-6">
		{!! Form::label('vin', 'VIN') !!}
		<div class="input-group-sm">
		  {!! Form::text('vin',$vehicleToUpdate->vin ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('vin')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	</div>

	<!-- Acepatar -->
	<div class="row mt-4">
	  <div class="col">
		<a class="btn btn-danger btn-block" href="{{ route('equipment.index') }}">{{__('Cancelar')}}</a>
	  </div>
	  <div class="col">
		{!! Form::submit('Aceptar',['class' => 'btn btn-success btn-block']); !!}
	  </div>
	</div>
