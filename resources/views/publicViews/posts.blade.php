@extends('layouts.base')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col text-center" id="title-blog">
			<h1>Noticias</h1>
			<div id="cuadro"></div>
			</div>
		</div>
		<div class="row posts">
			<div class="col-md-9">

				@foreach($posts as $post)

					<div class="card ">
						<div class="row d-flex">
							<div class="col-md-6 ">
								<div id="posts-left-side" class="d-flex flex-column">
									<h5 class="card-title">{{$post->title}}</h5>
									<p class="card-text">{{$post->excerpt}}</p>
									<div class="mt-auto pt-4 d-flex justify-content-around align-items-center" >
										<p class="text-muted  mb-0">
	                        <em>
	                            &ndash; {{ $post->user->name }}
	                        </em>
	                        {{$post->created_at->format('d M Y')}}
	                  </p>
										<a href="{{route('post',$post->slug)}}" class="btn btn-SIR">Leer mas</a>
									</div>
								</div>
							</div>

							<div class="col-md-6 order-first order-md-1">
								<div id="posts-right-side">
									<!-- quitar esto solo eroa prueba -->
									<img 
										@if($post->id <= 30)
											src="{{$post->image}}" class="img-fluid">
										@else
											src="{{$post->get_image}}" class="img-fluid">
										@endif

									<p>
									@foreach($post->tags as $tag)
										<span class="badge badge-secondary">{{$tag->name}}</span>
									@endforeach
									</p>
									<p>
										<span class="badge badge-primary">{{$post->category->name}}</span>
									</p>
								</div>
							</div>	
						</div>
					</div>

				@endforeach

			</div>
			<div class="col-md-3">
				<div class="card" id="categories-card">
					<h4 class="card-title text-center">{{__('Categorias')}}</h4>
					<ul>
						@foreach($categories as $category)
						<li>
							 <a href="{{route('posts.categories',$category->name)}}">{{ $category->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>	
		</div>
		<div class="d-flex justify-content-center">
			{{$posts->render()}}
		</div>
	</div>
@endsection