
<div class="form-group">
  <label for="name">{{ __('Nombre') }}</label>
  <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" autocomplete="off" />
  @error('name')
  <small class="mt-0" style="color:red">{{ $message }}</small>
  @enderror
</div>
<div class="d-flex justify-content-center">
	<div class="col-md-6">
  	<button class="btn btn-primary btn-block" type="submit">{{ __('Aceptar') }}</button>
	</div>
</div>
