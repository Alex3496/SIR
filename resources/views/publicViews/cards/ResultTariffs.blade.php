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
				<div class="row">
					<div class="col-md tariff-result-orgin">
						<small>{{__('Origen')}}:</small>
						<h5 class="text-16">{{$tariff->origin}},</h5>
						<h5 class="text-16">{{$tariff->get_state_origin}}, {{$tariff->get_country_origin}}</h5>
					</div>
					<hr>
					<div class="col-md tariff-result-destiny">
						<small>{{__('Destino')}}:</small>
						<h5 class="text-16">{{$tariff->destiny}},</h5>
						<h5 class="text-16">{{$tariff->get_state_destiny}}, {{$tariff->get_country_destiny}}</h5>
					</div>
					<div class="col-md">
						<small>{{__('Tipo de Equipo')}} :</small><br>
						<label class="mt-3">{{$tariff->get_type_equipment}}</label>
					</div>
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
			<div class="d-flex justify-content-center">
				<a href="{{route('booking.show',$tariff->id)}}" class="btn btn-SIR btn-block">{{__('Reservar')}}</a>
			</div>
			</div>
		</div>
	</div>
</div>	
@endforeach

<div>
	
{{ $tariffs->withQueryString()->links() }}
</div>

