@extends('layouts.dashboardAdmin.dashboard')
@section('content')
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				@if (session('status'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i>Error</h5>
          <p>{{ session('status') }}</p>
        </div>
      @endif
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">{{__('Editar ubucación')}}</h2>
					</div>
					<div class="card-body">
						{!! Form::open(['route' => ['admin.locations.update',$location], 'method' =>'PUT']) !!}
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
  $('#country').on('click',onSelectCountry);
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

