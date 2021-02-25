<div class="card card-warning ">
  <div class="card-header" data-card-widget="collapse">
    <h2 class="card-title">{{ __('Activos') }}</h2>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"> </i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">{{ __('Operadores') }}:</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-7 no-border">
          <p>{{ $operators }}</p>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">{{ __('Equipos') }}:</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-7 no-border">
          <p>{{ $equipments }}</p>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">{{ __('Vehículos') }}:</label>
      <div class="col d-flex justify-content-between">
        <div class="form-control col-7 no-border">
          <p>{{ $vehicles }}</p>
        </div>
      </div>
    </div>
    <hr/>
    <div class="form-group row">
      <div class="col d-flex justify-content-end">
        <a href="{{route('admin.users.actives',$userToEdit->id)}}" class="btn btn-outline-dark mr-4">{{ __('Ver') }} </a>
      </div>
    </div>
  </div>
</div>
