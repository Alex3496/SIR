@extends('layouts.dashboardUser.dashboard')
@section('content')
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-11">
				<div class="card card-info">
					<div class="card-header">
						<h2 class="card-title">{{__('Editar estancia')}}</h2>
					</div>
					<div class="card-body">
						{!! Form::open(['route' => ['stays.update',$stay], 'method' =>'PUT']) !!}
							@include('User.Stays.partials.form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('extraScript')
<script src="{{asset('js/checkboxes.js')}}"></script>
@endsection