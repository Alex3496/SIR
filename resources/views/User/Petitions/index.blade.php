@extends('layouts.dashboardUser.dashboard')
@section('extraCss')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"/>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<h2 class="mb-4">{{ __('Mis Cargas') }}</h2>
		</div>
	</div>

	<!--Alert-->
	<div class="row">
		<div class="col-md-11">
			@if (session('status'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>{{ __('Exito') }}</h5>
				<p>{{ session('status') }}</p>
			</div>
			@endif
		</div>
	</div>

	<!-- Content -->

	<div class="row">
	<div class="col-md-12 ">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">
					@if(isset($petitionToUpdate))
					{{ __('Editar Carga') }}
					@else
					{{ __('Añadir Carga') }}
					@endif
				</h3>
			</div>
			<div class="card-body">
				@if(isset($petitionToUpdate))
				{!! Form::open(['route' =>['petitions.update', $petitionToUpdate->id], 'method' =>'PUT']) !!}
				@else
				{!! Form::open(['route' =>'petitions.store']) !!}
				@endif
				<input type="hidden" id="type_tariff" name="type_tariff" value="TRUCK"/>
				<div class="row">
					<div class="form-group col-md">
						{!! Form::label('origin_country', 'Pais origen') !!}
						<div class="input-group-sm">
							{!! Form::select('origin_country', $countries , $petitionToUpdate->origin_country ?? 'MX' , ['class' =>'form-control']) !!}
						</div>
						@error('origin_country')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md">
						{!! Form::label('origin_state', 'Estado origen') !!}
						<div class="input-group-sm">
							{!! Form::select('origin_state', $states_origin ?? [], $petitionToUpdate->origin_state ?? '', ['class' =>'form-control']) !!}
						</div>
						@error('origin_state')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md">
						{!! Form::label('origin', 'Ciudad origen') !!}
						<div class="input-group-sm">
							{!! Form::text('origin',$petitionToUpdate->origin ?? '',['class' =>'form-control', 'autocomplete' => 'off']) !!}
						</div>
						@error('origin')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="form-group col-md">
						{!! Form::label('destiny_country', 'Pais destino') !!}
						<div class="input-group-sm">
							{!! Form::select('destiny_country', $countries , $petitionToUpdate->destiny_country ?? 'MX' , ['class' =>'form-control']) !!}
						</div>
						@error('destiny_country')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md">
						{!! Form::label('destiny_state', 'Estado destino') !!}
						<div class="input-group-sm">
							{!! Form::select('destiny_state', $states_destiny ?? [] , $petitionToUpdate->destiny_state ?? '' , ['class' =>'form-control']) !!}
						</div>
						@error('destiny_state')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md">
						{!! Form::label('destiny', 'Ciudad destino') !!}
						<div class="input-group-sm">
							{!! Form::text('destiny',$petitionToUpdate->destiny ?? '',['class' =>'form-control','autocomplete' => 'off']) !!}
						</div>
						@error('destiny')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
				</div>
				<hr/>
				<div class="row mb-3">
					<div class="col-12">
						<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseExample" aria-controls="collapseExample" {{ isset($petitionToUpdate->origin_address) ? 'aria-expanded=true' : 'aria-expanded=false' }}
						>
							Añadir Dirección <small>(opcional)</small>
						</button>
						<div class="collapse {{ isset($petitionToUpdate->origin_address) ? 'show' : '' }}" id="collapseExample">
							<div class="row div-collapse">
								<div class="form-group col-md-4">
									{!! Form::label('origin_address', 'Dirección de Recolección') !!}
									<div class="input-group-sm">
										{!! Form::text('origin_address',$petitionToUpdate->origin_address ?? '',['class' =>'form-control', 'autocomplete' => 'off', 'placeholder' => 'Max. 150 caraceteres']) !!}
									</div>
									@error('origin_address')
									<small class="mt-0" style="color:red">{{ $message }}</small>
									@enderror
								</div>
								<div class="form-group col-md-4">
									{!! Form::label('destiny_address', 'Dirección de Entrega') !!}
									<div class="input-group-sm">
										{!! Form::text('destiny_address',$petitionToUpdate->destiny_address ?? '',['class' =>'form-control', 'autocomplete' => 'off', 'placeholder' => 'Max. 150 caraceteres']) !!}
									</div>
									@error('destiny_address')
									<small class="mt-0" style="color:red">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						{!! Form::label('approx_weight','Peso estimado *') !!}
						<div class="input-group-sm select-input-container">
							{!! Form::text('approx_weight',$petitionToUpdate->approx_weight ?? '0',['class' =>'form-control input-number',]) !!}
							{!! Form::select('type_weight',['kg' => 'Kg', 'lb' => 'Lb'],$petitionToUpdate-> type_weight ?? '',['class' => 'form-control select-in']) !!}
						</div>
						@error('approx_weight')
							<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
						@error('type_weight')
							<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md-3">
						{!! Form::label('type_equipment','Tipo de equipo *') !!}
						<div class="input-group-sm">{{ Form::select('type_equipment',[
							'Dry Box 48 ft'    => 'Caja seca 48 pies', 
							'Dry Box 53 ft'    => 'Caja seca 53 pies',
							'Refrigerated Box 53 ft'   => 'Caja Refigerada 53 pies',
							'Plataform 48 ft'  => 'Plataforma 48 pies',
							'Plataform 53 ft'  => 'Plataforma 53 pies',
							'Container 20 ft'  => 'Contenedor 20 pies',
							'Container 40 ft'  => 'Contenedor 40 pies',
							'Container 40 ft High cube' => 'Contenedor 40 pies High cube',], 
							$petitionToUpdate->type_equipment ?? '',['class' =>'form-control']) }}
						</div>
						@error('type_equipment')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md-4">
					    {!! Form::label('load_date','Fecha de Carga') !!} *
					    {!! Form::date('load_date', $petitionToUpdate->load_date ?? \Carbon\Carbon::now(),['class' =>'form-control']) !!}
					    @error('load_date')
					    	<small class="mt-0" style="color:red">{{ $message }}</small>
					    @enderror
					</div>
					<div class="form-group col-md-2">
					    {!! Form::label('load_hour','Hora de carga') !!}
					    <div class="input-group date" id="timepicker" data-target-input="nearest">
					      <input name="load_hour" type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" value="{{$petitionToUpdate->load_hour ?? old('load_hour') ?? 12  }}"/>
					      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
					        <div class="input-group-text"><i class="far fa-clock"></i></div>
					      </div>
					    </div>
					    @error('load_hour')
					    <small class="mt-0" style="color:red">{{ $message }}</small>
					    @enderror
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						{!! Form::label('rate','Tarifa') !!} *
						<div class="input-group-sm select-input-container">
							{!! Form::text('rate',$petitionToUpdate->rate ?? '0.00',['class' =>'form-control input-number','autocomplete' => 'off',]) !!}
							{!! Form::select('currency',['MXN' => 'MXN', 'USD' => 'USD'],$petitionToUpdate-> currency ?? '',['class' => 'form-control select-in']) !!}
						</div>
						@error('rate')
							<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
						@error('currency')
							<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>

					<div class="form-group col-md-3">
						{!! Form::label('extra','Mercancia') !!} *
						<div class="input-group-sm">
							{!! Form::text('extra',$petitionToUpdate-> extra ?? '',['class' =>'form-control','autocomplete' => 'off', 'maxlength' => '25', 'placeholder' => 'max. 25 caracteres']) !!}
						</div>
						@error('extra')
							<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
	
				</div>
				<div class="row">
					<div class="col-md-6 col-radio">
					@if(isset($petitionToUpdate))
						<label for="po_reference">
							<input type="radio" id="po_reference" name="info" value="po_reference" onclick="hideinfo('po_reference')" checked
							  {{ (old('info') == 'po_reference') || $petitionToUpdate->info == 'po_reference' ? 'checked' : '' }}
							>
							# PO
					  	</label>
					  	<label for="bill_landing">
							<input type="radio" id="bill_landing" name="info" value="bill_landing" onclick="hideinfo('bill_landing')"
							  {{ (old('info') == 'bill_landing') || $petitionToUpdate->info == 'bill_landing'  ? 'checked' : '' }}
							>
							Bill of Landing
					  	</label>
					  	<label for="both">
							<input type="radio" id="both" name="info" value="both" onclick="hideinfo('both')"
						  		{{ (old('info') == 'both') || $petitionToUpdate->info == 'both'  ? 'checked' : '' }}
							>
							Ambas
					  	</label>
					@else
						<label for="po_reference">
							<input type="radio" id="po_reference" name="info" value="po_reference" onclick="hideinfo('po_reference')" checked
							  {{ (old('info') == 'po_reference') ? 'checked' : '' }}
							>
							# PO
						</label>
						<label for="bill_landing">
							<input type="radio" id="bill_landing" name="info" value="bill_landing" onclick="hideinfo('bill_landing')"
							  {{ (old('info') == 'bill_landing') ? 'checked' : '' }}
							>
							Bill of Landing
						</label>
						<label for="both">
							<input type="radio" id="both" name="info" value="both" onclick="hideinfo('both')"
							  {{ (old('info') == 'both')? 'checked' : '' }}
							>
							Ambas
						</label>
					@endif
				  	</div>
				</div>
				<div class="row" >
				    <!-- Pago a operador -->
				    <div class="form-group col-md-6" id="col-po" style="display: none;">
				      {!! Form::label('po_reference', '#PO / Referencia') !!}
				      <div class="input-group-sm">
				        {!! Form::text('po_reference',$petitionToUpdate->po_reference ?? 0,['class' =>'form-control','min' => '0', 'autocomplete' => 'off']) !!}
				      </div>
				      @error('po_reference')
				        <small class="mt-0" style="color:red">{{ $message }}</small>
				      @enderror
				    </div>

				    <!-- Cobro a cliente-->
				    <div class="form-group col-md-6" id="col-bill" style="display: none;">
				      {!! Form::label('bill_landing', 'Bill of Landing') !!}
				      <div class="input-group-sm">
				        {!!  Form::text('bill_landing', $petitionToUpdate->bill_landing ?? 0, ['class' => 'form-control','min' => '0','autocomplete' => 'off']); !!}
				      </div>
				      @error('bill_landing')
				        <small class="mt-0" style="color:red">{{ $message }}</small>
				      @enderror
				    </div>
				</div>
				<div class="row mt-4">
					<div class="col-6">
						@if(isset($petitionToUpdate))
							<a class="btn btn-danger btn-block" href="{{ route('petitions.index') }}">{{ __('Cancelar') }}</a>
						@endif
					</div>
					<div class="col-6">
						{!! Form::submit('Guadar',['class' =>'btn btn-success btn-block']); !!}
					</div>
				</div>
				{!! Form::close() !!}
				<!-- /form -->
			</div>
		</div>
	</div>
</div>

	<!--Start row Petitions List-->
	<div class="row">
		<div class="col-12">
			<!--start petitions card-->
			@if(isset($petitions) && !count($petitions) == 0)
				@include('User.Petitions.list')
			@endif
			<!--/end card-->
		</div>
	</div>
	<!--/End row Tariff List-->

	<!-- /Content -->

</div>
@endsection

@section('extraScript')


<!-- DataTables -->
<script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminLTE/js/demo.js')}}"></script>
<script src="{{asset('js/checkboxes.js')}}"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$(".example2").DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"autoWidth": false,
			"responsive": true,
		});

	}); 
</script>
<script defer>

$(function(){
	$('#origin_country').on('change',onSelectCountry);
});


function onSelectCountry() {
	var country_code = document.getElementById("origin_country").value;

	var url = "{{url('/')}}"+'/api/country/'+country_code+'/states';

	$.get(url,function(data) {
		console.log(data);
		var html_select = '';
		Object.keys(data).forEach(function(key) {
			var OldValue = '{{ old('origin_state') }}';
			if(key === OldValue){
				html_select += '<option selected value = "'+key+'">'+data[key]+'</option>';
			}
			else { html_select += '<option value = "'+key+'">'+data[key]+'</option>';} 
		})
		$('#origin_state').html(html_select);
	});
}


$(function(){
	$('#destiny_country').on('change',onSelectCountry2);
});

function onSelectCountry2() {
	var country_code = document.getElementById("destiny_country").value

	var url = "{{url('/')}}"+'/api/country/'+country_code+'/states';

	$.get(url,function(data) {
		console.log(data);
		var html_select = '';
		Object.keys(data).forEach(function(key) {
			var OldValue = '{{ old('destiny_state') }}';
			if(key === OldValue){
				html_select += '<option selected value = "'+key+'">'+data[key]+'</option>';
			}
			else { html_select += '<option value = "'+key+'">'+data[key]+'</option>';} 
		})
		$('#destiny_state').html(html_select);

	});
}


</script>

<!-- Si se va a editar una tarifa que no se actualizce los valores de los selects -->
@if(!isset($petitionToUpdate) || $errors->any())
<script>
	$( document ).ready(function() {
		onSelectCountry();
		onSelectCountry2();
});
</script>          
@endif

@endsection
