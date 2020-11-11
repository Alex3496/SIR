@foreach($petitions as $petition)
<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md tariff-result-orgin">
						<small>{{__('Origen')}}:</small>
						<h5 class="text-16">{{$petition->origin}},</h5>
						<h5 class="text-16">{{$petition->get_state_origin}}, {{$petition->get_country_origin}}</h5>
					</div>
					<hr>
					<div class="col-md tariff-result-destiny">
						<small>{{__('Destino')}}:</small>
						<h5 class="text-16">{{$petition->destiny}},</h5>
						<h5 class="text-16">{{$petition->get_state_destiny}}, {{$petition->get_country_destiny}}</h5>
					</div>
					<div class="col-md">
						<small>{{__('Tipo de Contenedor')}} :</small><br>
						<label class="mt-3">{{$petition->get_type_equipment}}</label>
					</div>
				</div>
				<hr>
				<div class="d-flex align-items-center">
					<img src="{{$petition->user->get_image}}" class="logo-company-tariff-card">
					<div class="ml-4">
						<small>{{__('Empresa')}}:</small>
						<h5>{{ $petition->user->company_name }}</h5>
					</div>
				</div>
			</div>	
			<div class="col-md-4 d-flex flex-column justify-content-around" id="tariff-right-card">
			<div  class="d-flex justify-content-center">
				<h2>${{$petition->rate}}</h2><span> {{$petition->currency}}</span>
			</div>
			<div class="d-flex justify-content-center">
				<a href="{{route('booking.showPetition',$petition->id)}}" class="btn btn-SIR btn-block">{{__('Contactar')}}</a>
			</div>
			</div>
		</div>
	</div>
</div>	
@endforeach

<div>
	
{{ $petitions->withQueryString()->links() }}
</div>

