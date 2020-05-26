@extends('layouts.base')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col text-center">
			<h1>Noticias</h1>
			<div id="cuadro"></div>
			</div>
		</div>
		<div class="row posts">
			<div class="col-md-9">

				@foreach($posts as $post)

					<div class="card ">
						<div class="row">
							<div class="col-6">
								<div id="posts-left-side" class="d-flex flex-column">
									<h5 class="card-title">{{$post->title}}</h5>
									<p class="card-text">{{$post->get_excerpt}}Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<div class="mt-auto pt-4 d-flex justify-content-around align-items-center" >
										<p class="text-muted  mb-0">
	                        <em>
	                            &ndash; {{ $post->user->name }}
	                        </em>
	                        {{$post->created_at->format('d M Y')}}
	                    </p>
										<button class="btn btn-SIR">Leer mas</button>
									</div>
								</div>
							</div>

							<div class="col-6">
								<div id="posts-right-side">
									<img src="{{$post->image}}" class="img-fluid">
									<p><span class="badge badge-secondary">New</span></p>
								</div>
							</div>	
						</div>
					</div>

				@endforeach

			</div>
			<div class="col-md-3">
				categorias
			</div>	
		</div>
		<div class="d-flex justify-content-center">
			{{$posts->render()}}
		</div>
	</div>
@endsection