
<div class="card card-warning">
  <div class="card-header">
    <h2 class="card-title">Información Personal</h2>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-8 no-border">
          <p>{{ $userToEdit->name }}</p>
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
          <p>{{ $userToEdit->phone }}</p>
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
          <p>{{ $userToEdit->email }}</p>
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
      <label class="col-sm-2 col-form-label">{{ __('Puesto') }}</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-8 no-border">
          <p>{{ $userToEdit->position }}</p>
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


@include('Admin.Users.modals.name')

@include('Admin.Users.modals.phone')

@include('Admin.Users.modals.email')

@include('Admin.Users.modals.position')