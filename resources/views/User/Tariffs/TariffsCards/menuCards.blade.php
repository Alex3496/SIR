@extends('User.Tariffs.tariffsBase')
@section('tariffCard')
<div class="row">
	<div class="col-lg-8 col-xl-7">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col">	
						<h5>{{__('Añadir nueva Tarifa:')}}</h5>
					</div>
				</div>
				<div class="row mt-3 ml-3 mb-4">
					<a href="{{route('tariff.turckAdd')}}" class="btn btn-info col-xl-2 mt-2 mr-3">{{__('Camión')}}</a>
					<a href="{{route('tariff.trainAdd')}}" class="btn btn-info col-xl-2 mt-2 mr-3">{{__('Tren')}}</a>
					<a href="{{route('tariff.maritimeAdd')}}" class="btn btn-info col-xl-2 mt-2 mr-3">{{__('Maritimo')}}</a>
					<a href="{{route('tariff.aerialAdd')}}" class="btn btn-info col-xl-2 mt-2 mr-3">{{__('Aéreo')}}</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection