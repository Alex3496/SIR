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
              @if(isset($equipmentToUpdate))
              {{__('Editar Operador')}}
              @else
              {{__('Añadir Operador')}}
              @endif
            </div>
            <div class="card-body">
              @if(isset($OperatorToUpdate))
              {!! Form::open(['route' =>['operator.update', $OperatorToUpdate->id], 'method' =>'PUT']) !!}
              @else
              {!! Form::open(['route'=>['operator.store']]) !!}
              @endif
                
                @include('User.Operator.partials.form')
                
              {!! Form::close() !!}
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(isset($operators))
    <div class="row justify-content-center">
      <div class="col-md-12">
         <!--start card User List-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __('Operadores Regsitrados') }}: {{$operators->total()}}</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>{{__('Nombre')}}</th>
                  <th>{{__('Licencia')}}</th>
                  <th>{{__('Visa')}}</th>
                  <th>{{__('Fast')}}</th>
                  <th>{{__('Gafete Unico')}}</th>
                  <th>{{__('R-Control')}}</th>
                  <th>{{__('Acciones')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($operators as $operator)
                <tr>
                  <td>{{ $operator->name }} {{ $operator->last_name }}</td>
                  <td>{{ $operator->license }}</td>
                  <td>{{ $operator->visa }}</td>
                  <td>{{ $operator->fast }}</td>
                  <td>{{ $operator->unique_badge }}</td>
                  <td>{{ $operator->r_control }}</td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <!-- Edit button -->
                      <a href="{{ route('operator.edit',$operator->id) }}" >
                        <button type="submit" class="btn btn-primary">{{__('Editar')}}</button>
                      </a>
                      <!-- Delete button -->
                      <form action="{{ route('operator.destroy',$operator->id) }}" method="POST" class="ml-2">
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
          <div class="row">
            <div class="col-12 center">
              {{ $operators->links() }}
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
@endsection