@foreach($tariffs as $tariff)
<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col text-center">
				<b>{{$tariff->get_type_tariff}}</b>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-8">
				<div>
					<small>{{__('Origen')}}:</small>
					<h2>{{$tariff->origin}}</h2>
					<h5>{{$tariff->get_state_origin}}, {{$tariff->get_country_origin}}</h5>
				</div>
				<hr>
				<div>
					<small>{{__('Destino')}}:</small>
					<h2>{{$tariff->destiny}}</h2>
					<h5>{{$tariff->get_state_destiny}}, {{$tariff->get_country_destiny}}</h5>
				</div>
				<hr>
				<div class="d-flex align-items-center">
					<img src="{{$tariff->user->get_image}}" class="logo-company-tariff-card">
					<div class="ml-4">
						<small>{{__('Empresa')}}:</small>
						<h5>{{ $tariff->user->company_name }}</h5>
					</div>
				</div>
			</div>	
			<div class="col-md-4 d-flex flex-column justify-content-around" id="tariff-right-card">
			<div  class="d-flex justify-content-center">
				<h2>${{$tariff->rate}}</h2><span> {{$tariff->currency}}</span>
			</div>
			<div class="text-center">
				<small>{{__('Tipo de Contenedor')}} :</small><br>
				<label>{{$tariff->get_type_equipment}}</label>
			</div>
			<div class="d-flex justify-content-center">
				<a href="{{route('booking.show',$tariff->id)}}" class="btn btn-SIR btn-block">{{__('Booking')}}</a>
			</div>
			</div>
		</div>
	</div>
</div>	
@endforeach

