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
			<h2 class="mb-4">{{ __('Mis Tarifas') }}</h2>
		</div>
	</div>

	<!-- card -->
		@yield('tariffCard')
	<!-- /card -->


	<!--Start row Tariff List-->
	<div class="row">
		<div class="col-12">
			<!--start truck card-->
			@if(isset($truckTariffs) && !count($truckTariffs) == 0)
				@include('User.Tariffs.lists.truck')
			@endif
			<!--/end card-->

			<!--start train card-->
			@if(isset($trainTariffs) && !count($trainTariffs) == 0)
				@include('User.Tariffs.lists.train')
			@endif
			<!--/end card-->

			<!--start train card-->
			@if(isset($maritimeTariffs) && !count($maritimeTariffs) == 0)
				@include('User.Tariffs.lists.maritime')
			@endif
			<!--/end card-->

			<!--start train card-->
			@if(isset($aerialTariffs) && !count($aerialTariffs) == 0)
				@include('User.Tariffs.lists.aerial')
			@endif
			<!--/end card-->
		</div>
	</div>
	<!--/End row Tariff List-->
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
@if(!isset($tariffToUpdate) || $errors->any())
<script>
	$(document).ready(function() {
		onSelectCountry();
		onSelectCountry2();
	});
</script>          
@endif

@endsection
