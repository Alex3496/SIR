@extends('layouts.dashboardUser.dashboard')
@section('content')
@include('layouts.alerts.emailVerifyAlert')
@if (session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"> </i>Exito</h5>
  <p>{{ session('status') }}</p>
</div>
@endif
<div class="container">
	<div class="row">
		<div class="col text-center">
			<h2>No Tienes niniguna tarifa guarda</h2>
		</div>
	</div>
</div>
@endsection
