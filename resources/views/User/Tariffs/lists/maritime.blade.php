
<div class="card card-info" id="card-tariffs-list">
  <div class="card-header">
    <h3 class="card-title">{{ __('Lista de Tarifas') }} : {{__('Maritimo')}}</h3>
  </div>
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover example2">
      <thead>
        <tr>
          <th>{{ __('Fecha') }}</th>
          <th>{{ __('Origen') }}</th>
          <th>{{ __('Destino') }}</th>
          <th>{{ __('Tipo de equipo') }}</th>
          <th>{{ __('Tarifa') }}</th>
          <th>{{ __('Disponibilidad') }}</th>
          <th>{{ __('Acciones') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($maritimeTariffs as $tariff)
        <tr>
          <td>{{ $tariff->created_at->format('d-m-Y') }}</td>
          <td>{{ $tariff->origin }}</td>
          <td>{{ $tariff->destiny }}</td>
          <td>{{ $tariff->get_type_equipment }}</td>
          <td>$ {{ $tariff->rate }} {{$tariff->currency}}</td>
          <td class="center"><span class="{{ $tariff->get_available }}">{{ $tariff->get_available }}</span></td>
          <td>
            <div class="d-flex justify-content-center">
              <!-- Edit button -->
              <a href="{{ route('tariffs.edit',$tariff->id) }}">
                <button type="submit" class="btn btn-primary btn-edit">
                  <img src="{{ asset('images/icons/edit.svg') }}" alt="edit">
                </button>
              </a>
              <!-- Delete button -->
              <form action="{{ route('tariffs.destroy',$tariff->id) }}" method="POST" class="ml-2">
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
</div>
