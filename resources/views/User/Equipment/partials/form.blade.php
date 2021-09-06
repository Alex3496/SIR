<div class="row">
	<div class="col mb-4">
		<h5 class="font-weight-bold" >Datos Generales</h5>
	</div>

	 <!-- Tipo -->
	<div class="col-12">
		<div class="form-group row">
			{!! Form::label('type', 'Tipo de Equipo',['class' => 'col-sm-3 col-form-label text-right']) !!}
			<div class="col-sm-6">
				<div class="input-group-sm">
				  {!!  Form::select('type', [
					'Dry Box 48 ft'    => 'Caja seca 48 pies', 
					'Dry Box 53 ft'    => 'Caja seca 53 pies',
					'Refrigerated Box 53 ft'   => 'Caja Refrigerada 53 pies',
					'Plataform 48 ft'  => 'Plataforma 48 pies',
					'Plataform 53 ft'  => 'Plataforma 53 pies',
					'Container 20 ft'  => 'Contenedor 20 pies',
					'Container 40 ft'  => 'Contenedor 40 pies',
					'Container 40 ft High cube' => 'Contenedor 40 pies High cube',
					'Panel'  => 'Panel',
                  	'Rabon'  => 'Rabon',
                  	'Torton'  => 'Torton',
                  	'Cama Z'  => 'Cama Z',
                  	'Cama baja'  => 'Cama baja',
                  	'Lowboy'  => 'Lowboy'], 
					 $equipmentToUpdate->type ?? null, ['id' => 'type', 'class' => 'custom-select']); !!}
				</div>
			</div>
			@error('type')
			  <small class="mt-0" style="color:red">{{ $message }}</small>
			@enderror	
		</div>
	</div>

	<!-- Economic -->
	<div class="col-12">
		<div class="form-group row">
		{!! Form::label('economic', 'Economico',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-6">
			<div class="input-group-sm">
			  {!! Form::text('economic',$equipmentToUpdate->economic ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
			</div>
		</div>
		@error('economic')
		 	<small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	</div>

	<!-- trademark -->
	<div class="col-12">
		<div class="form-group row">
		{!! Form::label('trademark', 'Marca',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-6">
			<div class="input-group-sm">
			  {!! Form::text('trademark',$equipmentToUpdate->trademark ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
			</div>
		</div>
		@error('trademark')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	</div>

	<!-- model -->
	<div class="col-12">
		<div class="form-group row">
		{!! Form::label('model', 'Modelo',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-6">
			<div class="input-group-sm">
			  {!! Form::text('model',$equipmentToUpdate->model ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
			</div>
		</div>
		@error('model')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	</div>

	<div class="col-12">
		<div class="form-group row">
		{!! Form::label('vin', 'VIN',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-6">
			<div class="input-group-sm">
			  {!! Form::text('vin',$equipmentToUpdate->vin ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
			</div>
		</div>
		@error('vin')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	</div>

	<div class="col-12 mb-4">
		<h5 class="font-weight-bold" >Tipo de Placas</h5>
	</div>

	<div class="col-12 row">
		<div class="col-sm-3 text-right">
			<label style="color: gray;">Seleccione el tipo de Placas:</label>
		</div>
		<div class="col-sm-6 col-radio">
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

	<div class="row" id="row-plates-us" style="width: 100%">
		<div class="col-12">
			<div class="form-group row">
				{!! Form::label('plates_us', 'Placas US',['class' => 'col-sm-3 col-form-label text-right']) !!}
				<div class="col-sm-6">
					<div class="input-group-sm">
						{!! Form::text('plates_us',$equipmentToUpdate->plates_us ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
					</div>
				</div>
				@error('plates_us')
					<small class="mt-0" style="color:red">{{ $message }}</small>
				@enderror
			</div>
		</div>

		<div class="col-12">
			<div class="form-group row">
				{!! Form::label('state_us', 'Estado US',['class' => 'col-sm-3 col-form-label text-right']) !!}
				<div class="col-sm-6">
					<div class="input-group-sm">
						{!!  Form::select('state_us', $states_us, $equipmentToUpdate->state_us ?? null, ['id' => 'plates_us', 'class' => 'custom-select']); !!}
					</div>
				</div>
				@error('state_us')
					<small class="mt-0" style="color:red">{{ $message }}</small>
				@enderror
			</div>
		</div>
	</div>

	<div class="row" id="row-plates-mx" style="width: 100%">
		<div class="col-12">
			<div class="form-group row">
				{!! Form::label('plates_mx', 'Placas MX',['class' => 'col-sm-3 col-form-label text-right']) !!}
				<div class="col-sm-6">
					<div class="input-group-sm">
						{!! Form::text('plates_mx',$equipmentToUpdate->plates_mx ?? null,['class' =>'form-control', 'autocomplete' => 'off']) !!}
					</div>
				</div>
				@error('plates_mx')
					<small class="mt-0" style="color:red">{{ $message }}</small>
				@enderror
			</div>
		</div>

		<div class="col-12">
			<div class="form-group row">
				{!! Form::label('state_mx', 'Estado MX',['class' => 'col-sm-3 col-form-label text-right']) !!}
				<div class="col-sm-6">
					<div class="input-group-sm">
						{!!  Form::select('state_mx', $states_mx, $equipmentToUpdate->states_mx ?? null, ['id' => 'state_mx', 'class' => 'custom-select']); !!}
					</div>
				</div>
				@error('state_mx')
					<small class="mt-0" style="color:red">{{ $message }}</small>
				@enderror
			</div>
		</div>
	</div>

	<div class="col-12 mb-4">
		<h5 class="font-weight-bold" >Disponibilidad</h5>
	</div>

	<!-- <div class="col-12">
		<div class="form-group row">
		{!! Form::label('estatus', 'Estatus',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-6">
			<div class="input-group-sm">
			  {!! Form::select('estatus',['active' => 'Activo', 'inactive' => 'Inactivo'],$equipmentToUpdate-> estatus ?? '',['class' => 'custom-select']) !!}
			</div>
		</div>
		@error('estatus')
		  <small class="mt-0" style="color:red">{{ $message }}</small>
		@enderror
	  </div>
	</div> -->

	<div class="col-12">
		<div class="form-group row">
		{!! Form::label('estatus', 'Desde',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-3">
			{!! Form::date('start_date', $equipmentToUpdate->start_date ?? \Carbon\Carbon::now(),['class' =>'form-control']) !!}
			@error('start_date')
				<small class="mt-0" style="color:red">{{ $message }}</small>
			@enderror
		</div>
		<div class="col-sm-3">
			<div class="input-group date" id="timepicker" data-target-input="nearest">
		    	<input name="start_hour" type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" value="{{$equipmentToUpdate->start_hour ?? old('start_hour') ?? 12  }}"/>
		    	<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
		        	<div class="input-group-text"><i class="far fa-clock"></i></div>
		      	</div>
		    </div>
		    @error('start_hour')
		    <small class="mt-0" style="color:red">{{ $message }}</small>
		    @enderror
		</div>
	  </div>
	</div>

	<div class="col-12">
		<div class="form-group row">
		{!! Form::label('estatus', 'Hasta',['class' => 'col-sm-3 col-form-label text-right']) !!}
		<div class="col-sm-3">
			{!! Form::date('end_date', $equipmentToUpdate->end_date ?? \Carbon\Carbon::now(),['class' =>'form-control']) !!}
			@error('end_date')
				<small class="mt-0" style="color:red">{{ $message }}</small>
			@enderror
		</div>
		<div class="col-sm-3">
			<div class="input-group date" id="timepicker2" data-target-input="nearest">
		    	<input name="end_hour" type="text" class="form-control datetimepicker-input" data-target="#timepicker2" data-toggle="datetimepicker" value="{{$equipmentToUpdate->end_hour ?? old('end_hour') ?? 01  }}"/>
		    	<div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
		        	<div class="input-group-text"><i class="far fa-clock"></i></div>
		      	</div>
		    </div>
		    @error('end_hour')
		    <small class="mt-0" style="color:red">{{ $message }} end_hour</small>
		    @enderror
		</div>
	  </div>
	</div>

	<div class="col-12 mb-4">
		<h5 class="font-weight-bold" >Localización</h5>
	</div>

	<div class="col-12">
		<div class="form-group row">
			{!! Form::label('type', 'Origen',['class' => 'col-sm-3 col-form-label text-right']) !!}
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group-sm">
						  {!! Form::select('origin_country', $countries , $equipmentToUpdate->origin_country ?? 'MX' , ['class' =>'form-control','placeholder' => 'Pais','id'=>'origin_country']) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group-sm">
						  {!! Form::select('origin_state', $states_origin ?? [], $equipmentToUpdate->origin_state ?? '', ['class' =>'form-control','id'=>'origin_state']) !!}
						</div>
					</div>
					<div class="col-sm-12 mt-2">
						<div class="input-group-sm">
							{!! Form::text('origin',$equipmentToUpdate->origin ?? '',['class' =>'form-control', 'autocomplete' => 'off','placeholder' => 'Ciudad']) !!}
						</div>
					</div>
				</div>
			@error('type')
			  <small class="mt-0" style="color:red">{{ $message }}</small>
			@enderror	
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="form-group row">
			{!! Form::label('type', 'Destino',['class' => 'col-sm-3 col-form-label text-right']) !!}
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group-sm">
						  {!! Form::select('destiny_country', $countries , $equipmentToUpdate->destiny_country ?? 'MX' , ['class' =>'form-control','placeholder' => 'Pais','id'=>'destiny_country']) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group-sm">
						  {!! Form::select('destiny_state', $states_origin ?? [], $equipmentToUpdate->destiny_state ?? '', ['class' =>'form-control','id'=>'destiny_state']) !!}
						</div>
					</div>
					<div class="col-sm-12 mt-2">
						<div class="input-group-sm">
							{!! Form::text('destiny',$equipmentToUpdate->destiny ?? '',['class' =>'form-control', 'autocomplete' => 'off','placeholder' => 'Ciudad']) !!}
						</div>
					</div>
				</div>
			@error('type')
			  <small class="mt-0" style="color:red">{{ $message }}</small>
			@enderror	
			</div>
		</div>
	</div>


</div>

<!-- Acepatar -->
<div class="row" style="margin-top: 4rem">
	<div class="col">
		<a class="btn btn-danger btn-block" href="{{ route('equipment.index') }}">{{__('Cancelar')}}</a>
	</div>
	<div class="col">
		{!! Form::submit('Aceptar',['class' => 'btn btn-success btn-block']); !!}
	</div>
</div>
