@extends('layouts.base')

@section('content')
	<div class="container" id="faqs">
		<div id="questions-card" class="card-body">
			<div class="row">
				<div class="col text-center" style="margin-bottom: 30px;">
					<h2 style="margin-bottom: 30px;">Preguntas frecuentes, que se tiene que modificar</h2>
					<div id="cuadro">
      				</div>
				</div>
			</div>

			@foreach($faqs as $faq)
			<div class="row">
				<div class="col">
					<a class="btn btn-secondary" data-toggle="collapse" href="#collapseAnswer1">
						{{ $faq->question }}
					</a>
					<div class="collapse answer " id="collapseAnswer1">
	  				<div class="card card-body">
	    				{{ $faq->answer }}
	  				</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
@endsection