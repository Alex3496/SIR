@extends('layouts.base')
@section('content')
<div class="container-md">
  <div class="row">
    <div class="col text-center" id="title-blog">
      <h1>Noticias</h1>
      <div id="cuadro"> </div>
    </div>
  </div>
  <div class="row post">
    <div class="col-md-8">
      <div class="card ">
        <div class="card-body">
          <h2 class="card-title">{{ $post->title }}</h2>
          <img class="img-fluid mt-2 mb-4"
          	@if($post-> id <= 30) 
          		src="{{ $post->image }}">
            @else
            	src="{{ $post->get_image }}">
            @endif
          <p>{!! $post->body !!}</p>

          <hr>

  					<p>
  						<b>Etiquetas: </b>
            	@foreach($post->tags as $tag)
            		<span class="badge badge-secondary">{{ $tag->name }}</span>
            	@endforeach
          	</p>

          <p>
            <b>Categoria: </b><span class="badge badge-primary">{{ $post->category->name }}</span>
          </p>

          <hr>

          <div class="row d-flex align-items-center pl-4">
          	<div>
          		<img src="{{$post->user->get_image}}" height="50" width="50" style="border-radius: 25px;">
          	</div>
	          <p class="text-muted  mb-0 ml-4">
		          <em>
		            &ndash; {{ $post->user->name }}
		          </em>
		          {{$post->created_at->format('d M Y')}}
		        </p>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-3 d-none d-md-block">
      <div class="card" id="categories-card">
        <h4 class="card-title text-center">{{ __('Categorias') }}</h4>
        <ul>
          @foreach($categories as $category)
          <li>
            <a href="#">{{ $category->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

