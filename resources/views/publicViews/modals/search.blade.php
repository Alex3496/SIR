<!-- Modal -->
<div class="modal fade" id="serchTariff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Busqueda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ route('tariffsResults') }}" method="GET">
            @csrf
            <div class="col d-flex justify-content-center mb-2 mt-0">
              <div class="route-item btn-group btn-group-toggle"  data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="type_tariff" checked="" value="TRUCK" />
                  {{ __('Camión') }}
                </label>
                <label class="btn btn-secondary active">
                  <input type="radio" name="type_tariff" value="TRAIN" />
                  {{ __('Tren') }}
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="type_tariff" value="MARITIME" />
                  {{ __('Marítimo') }}
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="type_tariff" value="AERIAL" />
                  {{ __('Aéreo') }}
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="origin">{{ __('Origen') }}</label>
              <input list="locations-origin" type="text" class="form-control" 
              id="origin-user" name="location_origin" placeholder="Pais, Ciudad, Puerto" autocomplete="off"/>
              <datalist id="locations-origin"> </datalist>
            </div>
            <div class="form-group">
              <label for="destiny">{{ __('Destino') }}</label>
              <input list="locations-destiny" type="text" class="form-control" 
              id="destiny-user" name="location_destiny" placeholder="Pais, Ciudad, Puerto" autocomplete="off"/>
              <datalist id="locations-destiny"> </datalist>
            </div>
            <div class="form-group">
              <label for="send-date">Fecha de envío</label>
              <input type="date" class="form-control" id="send-date"/>
            </div>
            <div class="form-group">
              <label for="type-Load">Tipo de carga</label>
              <select class="custom-select" id="type-Load" name="tpye_equipment">
                <option value="LCL" selected>LCL</option>
                <option value="FLC">FLC</option>
                <option value="BULK">BULK</option>
              </select>
            </div>
            <div class="row">
              <div class="col mt-2">
                <button type="submit" class="btn btn-SIR btn-block">{{ __('Buscar') }}</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>