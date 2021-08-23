@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-11">
		 	<div class="row">
				<div class="col">
			 		<div class="card card-info">
						<div class="card-header">
							@if(isset($equipmentToUpdate))
								{{__('Editar Equipo')}}
							@else
								{{__('Añadir Equipo')}}
							@endif
						</div>
						<div class="card-body">
							@if(isset($equipmentToUpdate))
								{!! Form::open(['route' =>['equipment.update', $equipmentToUpdate->id], 'method' =>'PUT']) !!}
							@else
								{!! Form::open(['route'=>['equipment.store']]) !!}
							@endif
							
							@include('User.Equipment.partials.form')
				 				{!! Form::close() !!}
				  		</div>
			  		</div>
				</div>
		  	</div>
		</div>
	</div>
</div>
@endsection

@section('extraScript')
	<script src="{{asset('js/checkboxes.js')}}"></script>
@endsection