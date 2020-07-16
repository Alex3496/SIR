
<div class="card card-info" id="card-tariffs-list">
  <div class="card-header">
    <h3 class="card-title">{{ __('Lista de Tarifas') }} : {{__('Camión')}}</h3>
  </div>
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover example2">
      <thead>
        <tr>
          <th>{{ __('Fecha') }}</th>
          <th>{{ __('Origen') }}</th>
          <th>{{ __('Destino') }}</th>
          <th>{{ __('Tipo de equipo') }}</th>
          <th>{{ __('Peso') }}<small style="color: gray"> Aprox.</small></th>
          <th>{{ __('Distancia') }}</th>
          <th>{{ __('Tarifa') }}</th>
          <th>{{ __('Acciones') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($truckTariffs as $tariff)
        <tr>
          <td>{{ $tariff->created_at->format('d-m-Y') }}</td>
          <td>{{ $tariff->origin }}</td>
          <td>{{ $tariff->destiny }}</td>
          <td>{{ $tariff->get_type_equipment }}</td>
          <td>{{ $tariff->approx_weight }} {{ $tariff->type_weight }}</td>
          <td>{{ $tariff->distance }}</td>
          <td>$ {{ $tariff->rate }} {{$tariff->currency}}</td>
          <td>
            <div class="d-flex justify-content-center">
              <!-- Delete button -->
              <form action="{{ route('admin.tariffs.destroy',$tariff) }}" method="POST" class="ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __("Desea Eliminar?") }}')">{{__('Eliminar')}}</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
