
<div class="card card-info" id="card-tariffs-list">
  <div class="card-header">
    <h3 class="card-title">{{ __('Lista de Cargas Creadas') }}</h3>
  </div>
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover example2">
      <thead>
        <tr>
          <th>{{ __('Fecha de creación') }}</th>
          <th>{{ __('Origen') }}</th>
          <th>{{ __('Destino') }}</th>
          <th>{{ __('Tipo de equipo') }}</th>
          <th>{{ __('Peso') }}<small style="color: gray"> Aprox.</small></th>
          <th>{{ __('Tarifa') }}</th>
          <th>{{ __('Acciones') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($petitions as $petition)
        <tr>
          <td>{{ $petition->created_at->format('d-m-Y') }}</td>
          <td>{{ $petition->origin }}</td>
          <td>{{ $petition->destiny }}</td>
          <td>{{ $petition->get_type_equipment }}</td>
          <td>{{ $petition->approx_weight }} {{ $petition->type_weight }}</td>
          <td>$ {{ $petition->rate }} {{$petition->currency}}</td>
          <td>
            <div class="d-flex justify-content-center">
              <!-- Edit button -->
              <a href="{{ route('petitions.edit',$petition->id) }}" >
                <button type="submit" class="btn btn-primary btn-edit">
                  <img src="{{ asset('images/icons/edit.svg') }}" alt="edit">
                </button>
              </a>
              <!-- Delete button -->
              <form action="{{ route('petitions.destroy',$petition->id) }}" method="POST" class="ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-delete" onclick="return confirm('{{ __("Desea Eliminar?") }}')">
                  <img src="{{ asset('images/icons/delete.svg') }}" alt="delete">
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-12 center">
      {{ $petitions->links() }}
    </div>
  </div>
</div>
