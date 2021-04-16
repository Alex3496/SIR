<div class="row">
	<!-- Tipo -->
	<div class="form-group col-md-6">
		{!! Form::label('type', 'Tipo de Equipo') !!}
		<div class="input-group-sm">
		  {!!  Form::select('type', [
			'Dry Box 48 ft'    => 'Caja seca 48 pies', 
			'Dry Box 53 ft'    => 'Caja seca 53 pies',
			'Refrigerated Box 53 ft'   => 'Caja Refigerada 53 pies',
			'Plataform 48 ft'  => 'Plataforma 48 pies',
			'Plataform 53 ft'  => 'Plataforma 53 pies',
			'Container 20 ft'  => 'Contenedor 20 pies',
			'Container 40 ft'  => 'Contenedor 40 pies',
			'Container 40 ft High cube' => 'Contenedor 40 pies High cube',], 
			  $equipmentToUpdate->type ?? null, ['id' => 'type', 'class' => 'custom-select']); !!}
		</div>
		@error('type')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>

	  <!-- Economic -->
	  <div class="form-group col-md-6">
		{!! Form::label('economic', 'Economico') !!}
		<div class="input-group-sm">
		  {!! Form::text('economic',$equipmentToUpdate->economic ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('economic')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	
</div>
<div class="row">
	<dic class="col-md-6">
		<p>Seleccione el tipo de Placas:</p>
	</dic>
	<div class="col-12 col-radio">
		@if(isset($equipmentToUpdate))
            <label for="P_US">
				<input type="radio" id="P_US" name="plates" value="P_US" onclick="hidePlates('P_US')" checked
					{{ (old('plates') == 'P_US') || $equipmentToUpdate->plates == 'P_US' ? 'checked' : '' }}
				>
				Placas Americanas
			</label>
			<label for="P_MX">
				<input type="radio" id="P_MX" name="plates" value="P_MX" onclick="hidePlates('P_MX')"
					{{ (old('plates') == 'P_MX') || $equipmentToUpdate->plates == 'P_MX'  ? 'checked' : '' }}
				>
				Placas Mexicanas
			</label>
			<label for="P_both">
				<input type="radio" id="P_both" name="plates" value="P_both" onclick="hidePlates('P_both')"
					{{ (old('plates') == 'P_both') || $equipmentToUpdate->plates == 'P_both'  ? 'checked' : '' }}
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
			{!! Form::text('plates_us',$equipmentToUpdate->plates_us ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('plates_us')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>

	  <!-- Estado US -->
	<div class="form-group col-md-6">
		{!! Form::label('state_us', 'Estado US') !!}
		<div class="input-group-sm">
			{!!  Form::select('state_us', $states_us, $equipmentToUpdate->state_us ?? null, ['id' => 'plates_us', 'class' => 'custom-select']); !!}
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
			{!! Form::text('plates_mx',$equipmentToUpdate->plates_mx ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
		</div>
		@error('plates_mx')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>

	  <!-- Estado MX -->
	<div class="form-group col-md-6">
		{!! Form::label('state_mx', 'Estado MX') !!}
		<div class="input-group-sm">
			{!!  Form::select('state_mx', $states_mx, $equipmentToUpdate->states_mx ?? null, ['id' => 'state_mx', 'class' => 'custom-select']); !!}
		</div>
		@error('state_mx')
			<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	</div>
</div>

<div class="row">
	  <!-- placas MX -->
	  <div class="form-group col-md-6">
		{!! Form::label('vin', 'VIN') !!}
		<div class="input-group-sm">
		  {!! Form::text('vin',$equipmentToUpdate->vin ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
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
