<div class="row">

	<!-- Economic -->
	<div class="form-group col-md-4">
		{!! Form::label('economic', 'Economico') !!}*
		<div class="input-group-sm">
			{!! Form::text('economic',$vehicleToUpdate->economic ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('economic')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>
	<div class="form-group col-md-4">
		{!! Form::label('trademark', 'Marca') !!}*
		<div class="input-group-sm">
			{!! Form::text('trademark',$vehicleToUpdate->trademark ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('trademark')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>
	<div class="form-group col-md-4">
		{!! Form::label('model', 'Modelo') !!}*
		<div class="input-group-sm">
			{!! Form::text('model',$vehicleToUpdate->model ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('model')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>
</div>	

<div class="row">
	<dic class="col-md-6">
		<p>Seleccione el tipo de Placas:</p>
	</dic>
	<div class="col-12 col-radio">
		@if(isset($vehicleToUpdate))
            <label for="P_US">
				<input type="radio" id="P_US" name="plates" value="P_US" onclick="hidePlates('P_US')" checked
					{{ (old('plates') == 'P_US') || $vehicleToUpdate->plates == 'P_US' ? 'checked' : '' }}
				>
				Placas Americanas
			</label>
			<label for="P_MX">
				<input type="radio" id="P_MX" name="plates" value="P_MX" onclick="hidePlates('P_MX')"
					{{ (old('plates') == 'P_MX') || $vehicleToUpdate->plates == 'P_MX'  ? 'checked' : '' }}
				>
				Placas Mexicanas
			</label>
			<label for="P_both">
				<input type="radio" id="P_both" name="plates" value="P_both" onclick="hidePlates('P_both')"
					{{ (old('plates') == 'P_both') || $vehicleToUpdate->plates == 'P_both'  ? 'checked' : '' }}
				>
				Ambas
			</label>
        @else
            <label for="P_US">
				<input type="radio" id="P_US" name="plates" value="P_US" onclick="hidePlates('P_US')" checked
					{{ (old('plates') == 'P_US') ? 'checked' : '' }}
				>
				Placas Americanas
			</label>
			<label for="P_MX">
				<input type="radio" id="P_MX" name="plates" value="P_MX" onclick="hidePlates('P_MX')"
					{{ (old('plates') == 'P_MX') ? 'checked' : '' }}
				>
				Placas Mexicanas
			</label>
			<label for="P_both">
				<input type="radio" id="P_both" name="plates" value="P_both" onclick="hidePlates('P_both')"
					{{ (old('plates') == 'P_both')? 'checked' : '' }}
				>
				Ambas
			</label>
        @endif
	</div>
</div>	

<div class="row" id="row-plates-us" style="display: none;">
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
</div>

<div class="row" id="row-plates-mx" style="display: none;">
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
</div>

<div class="row">	
	  <!-- VIN -->
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
		<a class="btn btn-danger btn-block" href="{{ route('vehicle.index') }}">{{__('Cancelar')}}</a>
	  </div>
	  <div class="col">
		{!! Form::submit('Aceptar',['class' => 'btn btn-success btn-block']); !!}
	  </div>
	</div>
