@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container-fluid">
  @if(isset($equipments))
    <div class="row justify-content-center">
      <div class="col-md-12">
         <!--start card User List-->
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h3 class="card-title">{{ __('Equipos Regsitrados') }}: {{$equipments->total()}}</h3>
              </div>
              <div class="col-6" style="display: flex; justify-content: flex-end;"> 
                <a href="{{ route('equipment.create') }}" >
                  <button class="btn btn-primary btn-edit">
                    <img src="{{ asset('images/icons/plus.svg') }}" alt="edit">
                  </button>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>{{__('Tipo de Equipo')}}</th>
                  <th>{{__('Economico')}}</th>
                  <th>{{__('Placas US')}}</th>
                  <th>{{__('Estado US')}}</th>
                  <th>{{__('Placas MX')}}</th>
                  <th>{{__('Estado MX')}}</th>
                  <th>{{__('VIN')}}</th>
                  <th>{{__('Estatus')}}</th>
                  <th>{{__('Acciones')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($equipments as $equipment)
                <tr>
                  <td>{{ $equipment->get_type_equipment }}</td>
                  <td>{{ $equipment->economic }}</td>
                  <td>{{ $equipment->get_plates_us }}</td>
                  <td>{{ $equipment->get_state_us }}</td>
                  <td>{{ $equipment->get_plates_mx }}</td>
                  <td>{{ $equipment->get_state_mx }}</td>
                  <td>{{ $equipment->vin }}</td>
                  <td>{{ $equipment->get_estatus }}</td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <!-- Edit button -->
                      <a href="{{ route('equipment.edit',$equipment->id) }}" >
                        <button type="submit" class="btn btn-primary btn-edit">
                          <img src="{{ asset('images/icons/edit.svg') }}" alt="edit">
                        </button>
                      </a>
                      <!-- Delete button -->
                      <form action="{{ route('equipment.destroy',$equipment->id) }}" method="POST" class="ml-2">
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
              {{ $equipments->links() }}
            </div>
          </div>
        </div>
        <!--/end card-->
      </div>
    </div>
  @endif
</div>
@endsection

@section('extraScript')
<!-- DataTables -->
<script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminLTE/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $(".example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

  }); 
</script>
<script src="{{asset('js/checkboxes.js')}}"></script>
@endsection