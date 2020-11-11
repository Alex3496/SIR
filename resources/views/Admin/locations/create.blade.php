@extends('layouts.dashboardAdmin.dashboard')
@section('content')
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">{{__('Crear nueva ubucación')}}</h2>
					</div>
					<div class="card-body">
						{!! Form::open(['route' => 'admin.locations.store']) !!}
							@include('Admin.locations.partials.form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('extraScript')
<script>

$(function(){
  $('#country').on('change',onSelectCountry);
});

function onSelectCountry() {
  var country_code = $(this).val();

  var url = "{{url('/')}}"+'/api/country/'+country_code+'/states';

  $.get(url,function(data) {
    console.log(data);
    var html_select = '';
    Object.keys(data).forEach(function(key) {
        html_select += '<option value = "'+key+'">'+data[key]+'</option>'; 
    })
    $('#state').html(html_select);
  });
}


</script>
@endsection

