@extends('layouts.dashboardAdmin.dashboard')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				@if (session('status'))
	        <div class="alert alert-success alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	          <h5><i class="icon fas fa-check"></i>Exito</h5>
	          <p>{{ session('status') }}</p>
	        </div>
      	@endif
      	@if (session('errorB'))
	        <div class="alert alert-danger alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	          <h5><i class="icon fas fa-ban"></i>Alerta</h5>
	          <p>{{ session('errorB') }}</p>
	        </div>
      	@endif

      	@if ($errors->any())
	        <div class="alert alert-danger alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	          <h5><i class="icon fas fa-ban"></i>Alerta</h5>
	          <ul>
	          	@foreach($errors->all() as $error)
	          		<li>{{ $error }}</li>
	          	@endforeach
	          </ul>
	        </div>
      	@endif

				@include('layouts.cards.personalInfo')

			</div>
			<div class="col-md-3">
				@include('layouts.cards.avatar')
			</div>
		</div>
	</div>

	<!-- Modal -->
	@include('layouts.modals.name')

	@include('layouts.modals.phone')

	@include('layouts.modals.email')

	@include('layouts.modals.password')

	@include('layouts.modals.position')
@endsection

