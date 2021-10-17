@extends('layouts.base')
@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="card mt-4 mb-4">
				<div class="card-body">
					<div class="row">
						<div class="col-md-10 offset-md-1 text-center">
							<h2 class="title-booking">Reserva y contacta al Shipper para revisar los detalles de la carga.</h2>
							<p>*Las tarifas y las cargas aquí ofrecidas son responsabilidad del anunciante y/o empresa que ofrece las cargas. Ibookingsystem no interviene en las negocaciones entre el shipper y transportista.</p>
					 	</div>
					</div>
					<hr/>
					<div class="row">

						<!-- Columna izq -->
						<div class="col-md-8 pr-2 ">
							{!! Form::open(['route' => 'booking.send','method' => 'GET']) !!}
							{!! Form::hidden('id',$tariff->id) !!}
								<div class=" row">
									<div class="col-md-6">
										<small>{{ __('Origen') }}:</small>
										<h2>{{$tariff->origin}}</h2>
										<h5>{{$tariff->get_state_origin}}, {{$tariff->get_country_origin}}</h5>
									</div>
									<div class="col-md-6  pt-2">
										<label for="collection_address">{{__('Dirección de Recolección')}}</label>
										<div class="">
											{!! Form::text('collection_address','', ['class' => 'form-control']) !!}
										</div>
									</div>
								</div>
								<hr/>
								<div class=" row">
									<div class="col-md-6">
										<small>{{ __('Destino') }}:</small>
										<h2>{{$tariff->destiny}}</h2>
										<h5>{{$tariff->get_state_destiny}}, {{$tariff->get_country_destiny}}</h5>
									</div>
									<div class="col-md-6  pt-2">
										<label for="delivery_address">{{__('Dirección de Entrega')}}</label>
										<div>
											{!! Form::text('delivery_address','', ['class' => 'form-control']) !!}
										</div>
									</div>
								</div>
								<hr/>
								<div class="row">
									<div class="col-md-7">
										<div class="d-flex align-items-center">
											<img src="{{$tariff->user->get_image}}" class="logo-company-tariff-card">
											<div class="ml-4">
												<small>{{__('Empresa')}}:</small>
												<h5>{{ $tariff->user->company_name }}</h5>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										@if(isset($tariff->user->usdot))
										<div class="ml-4">
											<small>{{__('USDOT')}}:</small>
											<h5>{{ $tariff->user->usdot }}</h5>
										</div>
										@endif
										@if(isset($tariff->user->mc_mx ))
										<div class="ml-4">
											<small>{{__('MC / MX')}}:</small>
											<h5>{{ $tariff->user->mc_mx }}</h5>
										</div>
										@endif
									</div>
								</div>
								<hr>
								<div class="row">
					                <div class="col flex-column">
					                  <small class="mb-2">{{ __('Datos extra de la Tarifa') }}</small>
					                  <label><b>Mercancia: </b>  {{ $tariff->extra }}</label>
					                  <label><b>Disponible hasta: </b>  {{ date_format(date_create($tariff->end_date),'d - m - Y') }}</label>
					            	</div>
					            </div>
					            <hr>
								<div>
									<label>{{__('Ingrese sus datos de contacto e información de envío')}}</label>
									<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label">{{__('Nombre')}}*</label>
										<div class="col-md-5">
											{!! Form::text('name', Auth::user()->name , ['class' => 'form-control','required']) !!}
										</div>
									</div>
									<div class="form-group row">
										<label for="company_name" class="col-md-4 col-form-label">{{__('Nombre de la empresa')}}*</label>
										<div class="col-md-5">
											{!! Form::text('company_name', Auth::user()->company_name, ['class' => 'form-control','required']) !!}
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-md-4 col-form-label">{{__('Correo de contacto')}}*</label>
										<div class="col-md-5">
											{!! Form::email('email', Auth::user()->email, ['class' => 'form-control','required']) !!}
										</div>
									</div>
									<div class="form-group row">
										<label for="phone" class="col-md-4 col-form-label">{{__('Teléfono')}}</label>
										<div class="col-md-5">
											{!! Form::text('phone', Auth::user()->phone ?? '', ['class' => 'form-control']) !!}
										</div>
									</div>
									<!-- <div class="form-group row">
										<label for="scac_code" class="col-md-4 col-form-label">{{__('CAT/SCAC CODE')}}</label>
										<div class="col-md-5">
											{!! Form::text('scac_code','n/a',['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="form-group row">
										<label for="economic" class="col-md-4 col-form-label">{{__('Tractor (Económico)')}}</label>
										<div class="col-md-5">
											{!! Form::text('economic','n/a', ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="form-group row">
										<label for="equipment" class="col-md-4 col-form-label">{{__('Equipo (Económico)')}}</label>
										<div class="col-md-5">
											{!! Form::text('equipment', 'n/a' , ['class' => 'form-control']) !!}
										</div>
									</div> -->
									<div class="form-group row">
										<label for="date" class="col-md-4 col-form-label">{{__('Fecha de envío')}}</label>
										<div class="col-md-5">
											{!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control','required']) !!}
										</div>
									</div>
									<div class="form-group">
										<label for="message">{{__('Mensaje')}}</label>
											{!! Form::textarea('message', '', ['class' => 'form-control','placeholder' => '(Opcional) Puedes enviar más detalles sobre tu envio a la empresa de transporte', 'rows' => '5' ]) !!}    							
									</div>
									<div class="form-group"> 
										{!!  Form::submit('Booking',['class' => 'btn btn-SIR col-md-5']); !!}
									</div>
								</div>
							{!! Form::close() !!}
						</div>

						<!-- Columna der -->
						<div class="col-md-4 d-flex flex-column justify-content-between pr-2" id="info-column">
							<div id="info-inner" class="d-flex flex-column">
								<div  class="d-flex justify-content-center mt-4">
									<h2>${{$tariff->rate}}</h2><span class="pl-1 pt-2">{{$tariff->currency}}.</span>
								</div>
								<div class="text-center mt-4">
									<small>{{ __('Tipo de Equipo') }} :</small>
									<br/>
									<label>{{$tariff->get_type_equipment}}</label>
								</div>
								<div class="text-center mt-4">
									<small>{{ __('Peso aprox.') }} :</small>
									<br/>
									<label>{{$tariff->approx_weight }} {{$tariff->type_weight}}</label>
								</div>
								<div class="text-center mt-4">
									<small>{{ __('Tipo de Transporte') }} :</small>
									<br/>
									<label>{{$tariff->get_type_tariff}}</label>
								</div>
							</div>
							<div class="d-flex justify-content-center mb-3">
								<a href="{{route('booking.save',$tariff->id)}}" class="btn btn-secondary btn-block">{{ __('Guardar') }}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
