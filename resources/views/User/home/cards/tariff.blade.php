<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col text-center">
				<b>{{$tariff->get_type_tariff}}</b>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<small>{{__('Origen')}}:</small>
				<h5>{{$tariff->origin}} {{$tariff->get_state_origin}}, {{$tariff->get_country_origin}}</h5>
			</div>
			<div class="col">
				<small>{{__('Destino')}}:</small>
				<h5>{{$tariff->destiny}} {{$tariff->get_state_destiny}}, {{$tariff->get_country_destiny}}</h5>
			</div>
			<div class="col d-flex justify-content-center">
				<h2>${{$tariff->rate}}</h2><span>{{$tariff->currency}}</span>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<small>{{__('Empresa')}}:</small>
				<h5>{{ $tariff->user->company_name }}</h5>
			</div>
			<div class="col">
				<small>{{__('Tipo de Equipo')}} :</small><br>
				<label>{{$tariff->get_type_equipment}}</label>
			</div>
			<div class="col pt-2">
				<div class="row justify-content-around">
					<a href="{{route('booking.show',$tariff->id)}}" class="btn btn-success col-5">{{__('Ver')}}</a>
					<a href="{{route('booking.remove',$tariff->id)}}" class="btn btn-danger col-5">{{__('Eliminar')}}</a>
				</div>
			</div>
		</div>

	</div>
</div>	