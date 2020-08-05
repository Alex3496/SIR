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
		<div class="col">

			@if(!$tariffsSaved->isEmpty())
			<h2>{{__('Lista de tarifas guardadas')}}</h2>
				@foreach($tariffsSaved as $tariff)
					@include('User.home.cards.tariff')
				@endforeach
			@else
			<h2 class="text-center">{{__('No tienes ninguna Tarifa guardada')}}</h2>
			@endif


		</div>
	</div>
</div>
@endsection
