@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>Exito</h5>
          <p>{{ session('status') }}</p>
        </div>
      @endif
      <div class="row">
        <div class="col">
          <div class="card card-info">
            <div class="card-header">
              @if(isset($vehicleToUpdate))
              {{__('Editar Vehículo')}}
              @else
              {{__('Añadir Vehículo')}}
              @endif
            </div>
            <div class="card-body">
              @if(isset($vehicleToUpdate))
              {!! Form::open(['route' =>['vehicle.update', $vehicleToUpdate->id], 'method' =>'PUT']) !!}
              @else
              {!! Form::open(['route'=>['vehicle.store']]) !!}
              @endif
                
                @include('User.Vehicle.partials.form')
                
              {!! Form::close() !!}
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(isset($vehicles))
    <div class="row justify-content-center">
      <div class="col-md-12">
         <!--start card User List-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __('Vehículos Regsitrados') }}: {{$vehicles->total()}}</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
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
                @foreach($vehicles as $vehicle)
                <tr>
                  <td>{{ $vehicle->economic }}</td>
                  <td>{{ $vehicle->get_plates_us }}</td>
                  <td>{{ $vehicle->get_state_us }}</td>
                  <td>{{ $vehicle->get_plates_mx }}</td>
                  <td>{{ $vehicle->get_state_mx }}</td>
                  <td>{{ $vehicle->vin }}</td>
                  <td>{{ $vehicle->get_estatus }}</td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <!-- Edit button -->
                      <a href="{{ route('vehicle.edit',$vehicle->id) }}" >
                        <button type="submit" class="btn btn-primary btn-edit">
                          <img src="{{ asset('images/icons/edit.svg') }}" alt="edit">
                        </button>
                      </a>
                      <!-- Delete button -->
                      <form action="{{ route('vehicle.destroy',$vehicle->id) }}" method="POST" class="ml-2">
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
              {{ $vehicles->links() }}
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
<script src="{{asset('adminLTE/js/demo.js')}}"></script>
<script src="{{asset('js/checkboxes.js')}}"></script>
@endsection