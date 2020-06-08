<div class="card">

  @if($user->hasRole('user'))
  <div class="card-header" style="background-color:#343a40; color: white">
  @else
  <div class="card-header">
  @endif

    <h2 class="card-title">Información Personal</h2>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-8 no-border">
          <p>{{ $user->name }}</p>
        </div>
        <button 
          type="button" 
          class="btn btn-outline-dark mr-4" 
          data-toggle="modal" 
          data-target="#EditName">{{ __('Editar') }}
        </button>
      </div>
    </div>

    <hr/>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">{{ __('Teléfono') }}</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-8 no-border">
          <p>{{ $user->phone }}</p>
        </div>
        <button 
          type="button" 
          class="btn btn-outline-dark mr-4" 
          data-toggle="modal" 
          data-target="#EditPhone">{{ __('Editar') }}
        </button>
      </div>
    </div>

    <hr/>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">{{ __('Correo') }}</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-8 no-border">
          <p>{{ $user->email }}</p>
        </div>
        <button 
          type="button" 
          class="btn btn-outline-dark mr-4" 
          data-toggle="modal" 
          data-target="#EditEmail">{{ __('Editar') }}
        </button>
      </div>
    </div>

    <hr/>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">{{ __('Contraseña') }}</label>
      <div class="col d-flex justify-content-between">
        <input type="password" class="form-control col-8 no-border" value="password" disabled/>
        <button 
          type="button" 
          class="btn btn-outline-dark mr-4" 
          data-toggle="modal" 
          data-target="#EditPassword">{{ __('Editar') }}
        </button>
      </div>
    </div>

    <hr/>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">{{ __('Puesto') }}</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-8 no-border">
          <p>{{ $user->position }}</p>
        </div>
        <button 
          type="button" 
          class="btn btn-outline-dark mr-4" 
          data-toggle="modal" 
          data-target="#EditPosition">{{ __('Editar') }}
        </button>
      </div>
    </div>

  </div>
</div>
