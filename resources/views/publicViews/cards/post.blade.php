<div class="col-lg-4 d-flex justify-content-center">
  <div class="card card-news">
    <img src="{{ url($posts[$i]->image) }}" class="card-img-top" alt="...">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">{{ $posts[$i]->title }}</h5>
      <p class="card-text">{{ $posts[$i]->excerpt }}</p>
      <div class="mt-auto pt-4 d-flex justify-content-around align-items-center">
        <p class="text-muted  mb-0">
          <em>&ndash; {{ $posts[$i]->user->name }}</em>
          {{ $posts[$i]->created_at->format('d M Y') }}
        </p>
        <a href="{{ route('post',$posts[$i]->slug) }}" class="btn btn-SIR">
          {{__('Leer más')}}
        </a>
      </div>
    </div>
  </div>
</div>

