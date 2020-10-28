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
			<h2 class="mb-4">{{ __('Mis Peticiones') }}</h2>
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
	<div class="col-md-10 ">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">
					@if(isset($petitionToUpdate))
					{{ __('Editar Peticion') }}
					@else
					{{ __('Añadir Peticion') }}
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
				<div class="row">
					<div class="form-group col-md-4">
						{!! Form::label('approx_weight','Peso estimado *') !!}
						<div class="input-group-sm">
							{!! Form::number('approx_weight',$petitionToUpdate->approx_weight ?? '',['class' =>'form-control', 'min' =>0]) !!}
						</div>
						@error('approx_weight')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="col-sm-2 d-flex align-items-end hide">
						<div class="form-check ml-2 mb-4 hide">
							<input class="form-check-input" type="radio" name="type_weight" id="kg" value="kg" checked 
							{{ (old('type_weight') == 'kg') ? 'checked' : '' }} 
								@if(isset($petitionToUpdate))  
									@if($petitionToUpdate->type_weight == 'kg')
										checked
									@endif
								@endif/>
							<label class="form-check-label" for="kg">Kg.</label>
						</div>
						<div class="form-check ml-2 mb-4 hide">
							<input class="form-check-input" type="radio" name="type_weight" id="lb" value="lb"   
							{{ (old('type_weight') == 'lb') ? 'checked' : '' }} 
							@if(isset($petitionToUpdate))  
								@if($petitionToUpdate->type_weight == 'lb')
									checked
								@endif
							@endif/>
							<label class="form-check-label" for="lb">Lb.</label>
						</div>
						@error('Type_weigh')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group col-md-4">
						{!! Form::label('type_equipment','Tipo de equipo *') !!}
						<div class="input-group-sm">{{ Form::select('type_equipment',[
							'Dry Box 48 ft' =>'Caja seca 48 pies',
							'Dry Box 53 ft' =>'Caja seca 53 pies',
							'Refrigerated Box 53 ft' =>'Caja Refigerada 53 pies',
							'Plataform 48 ft' =>'Plataforma 48 pies',
							'Plataform 53 ft' =>'Plataforma 53 pies',], 
							$petitionToUpdate->type_equipment ?? '',['class' =>'form-control']) }}
						</div>
						@error('type_equipment')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2">
						{!! Form::label('rate','Tarifa') !!} *
						<div class="input-group-sm">
							{!! Form::text('rate',$petitionToUpdate->rate ?? '',['class' =>'form-control','autocomplete' => 'off']) !!}
						</div>
						@error('rate')
						<small class="mt-0" style="color:red">{{ $message }}</small>
						@enderror
					</div>

					<div class="form-group col-md-2">
						{!! Form::label('currency','Moneda') !!} *
						<div class="input-group-sm">
							{!! Form::select('currency',['MXN' => 'MXN', 'USD' => 'USD'],$petitionToUpdate-> currency ?? '',['class' => 'form-control']) !!}
						</div>
						@error('currency')
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
						{!! Form::submit('Aceptar',['class' =>'btn btn-success btn-block']); !!}
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
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$(".example2").DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
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
