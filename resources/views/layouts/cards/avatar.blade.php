<div class="card ">
  <div class="card-header" style="background-color:#343a40; color: white">
    <h2 class="card-title">{{ __('Imagen de perfil') }}</h2>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col d-flex justify-content-center">
        <div id="avatar-box" style="background-image:url('{{ $user->get_image }}')">
        </div>
      </div>
    </div>
    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col mt-4">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="avatar" name="avatar"/>
              <label class="custom-file-label" for="avatar">{{ __('Seleccionar imagen') }}</label>
            </div>
          </div>
          @error('avatar')
          	<small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
