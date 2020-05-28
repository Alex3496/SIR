
<div class="form-group">
  <label for="category_id">{{ __('Categorias') }} *</label>
  <select class="form-control" id="category_id" name="category_id">
  	@foreach($categories as $category)
  		<option 
  			value="{{$category->id}}"
  			@if(old('category_id') == $category->id)
  				selected 
  			@endif

        @if(isset($post->category_id))
          @if($post->category_id == $category->id)
            selected
          @endif
        @endif>
  				{{$category->name}} 
  		</option>
  	@endforeach
  </select>
  @error('category_id')
  	<small class="mt-0" style="color:red">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  <label for="title">{{ __('Titulo') }} *</label>
  <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" autocomplete="off" />
  @error('title')
 	<small class="mt-0" style="color:red">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
	<label for="image">{{__('Imagen')}}</label>
	<div class="custom-file">
	  <input type="file" class="custom-file-input" id="image" name="image">
	  <label class="custom-file-label" for="image">{{__('Selecciona una imagen')}}</label>
	</div>
</div>

<div class="form-group">
	<label for="excerpt">{{__('Extracto')}} *</label>
	<textarea class="form-control" name="excerpt" id="excerpt" rows="2">{{old('excerpt',$post->excerpt ?? '')}}</textarea>
</div>

<div class="form-group">
	<label for="body">{{__('Contenido')}} *</label>
	<textarea class="form-control" name="body" id="body" rows="5">{{old('body',$post->body ?? '')}}</textarea>
</div>

<div class="form-group">
	<label for="tags">{{__('Etiquetas')}} *</label>
	<div class="form-group row">

		@foreach($tags as $tag)
			<div class="form-check ml-2">
        <input class="form-check-input" type="checkbox" id="{{$tag->name}}" name="tags[]" value="{{$tag->id}}"

        @if(is_array(old('tags')) && in_array($tag->id, old('tags'))) 
          checked 
        @endif

        @if(isset($postTags)) 
          @if(in_array($tag->id,$postTags))
            checked
          @endif
        @endif/>

        <label class="form-check-label" for="{{$tag->name}}">{{$tag->name}}</label>
	    </div>
    @endforeach

  </div>
</div>

<div class="d-flex justify-content-center">
	<div class="col-md-6">
  	<button class="btn btn-primary btn-block" type="submit">{{ __('Aceptar') }}</button>
	</div>
</div>
