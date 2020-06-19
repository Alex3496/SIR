@extends('layouts.dashboardAdmin.dashboard')
@section('content')
	<div class="container-fluid">
		@if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>Exito</h5>
          <p>{{ session('status') }}</p>
        </div>
      @endif
		<div class="row">
			<div class="col">
				<div class="card">
          <div class="card-body">
            {!! Form::open(['route' => 'admin.locations.index','method' => 'GET']) !!}
              <div class="row">
                <div class="col-md mb-2">
                  {!! Form::text('city',request('city'),['class' => 'form-control', 'placeholder' => 'Ciudad']) !!}
                </div>
                <div class="col-md mb-2">
                  {!! Form::text('state',request('state'),['class' => 'form-control', 'placeholder' => 'Estado']) !!}
                </div>
                <div class="col-md mb-2">
                  {!! Form::text('country',request('country'),['class' => 'form-control', 'placeholder' => 'País']) !!}
                </div>
                <div class="col-xl-3 mb-2 d-flex justify-content-center align-items-center">
                	<div class="form-check form-check-inline">
                		{!! Form::checkbox('status[]', 'ACCEPTED','',['class' => 'form-check-input','id' => 'status-0']); !!}
  									<label class="form-check-label" for="status-0">Acepado</label>
									</div>
									<div class="form-check form-check-inline">
  									{!! Form::checkbox('status[]', 'PENDING',true,['class' => 'form-check-input','id' => 'status-1']); !!}
  									<label class="form-check-label" for="status-1">Pendiente</label>
									</div>
									<div class="form-check form-check-inline">
  									{!! Form::checkbox('status[]', 'REJECTED','',['class' => 'form-check-input','id' => 'status-2']); !!}
  									<label class="form-check-label" for="status-2">Rechazado</label>
									</div>
                </div>
                <div class="col-lg-2">
                  {!! Form::submit('Buscar',['class' => 'btn btn-primary col']) !!}
                </div>
              </div>
            {!! Form::close() !!}
          </div>  
        </div>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">Lista de ubicaciones para busqueda</h2>
						<div class="card-tools">
            <a href="{{ route('admin.locations.create') }}" class="btn btn-secondary mr-3">{{__('Crear nueva ubucación')}}</a>
          </div>
					</div>
					<div class="card-body">
						<table id="example2" class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>{{__('Ciudad')}}</th>
                <th>{{__('Estado')}}</th>
                <th>{{__('País')}}</th>
                <th>{{__('Estatus')}}</th>
                <th>{{__('Acciones')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($locations as $location)
              <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->city }}</td>
                <td>{{ $location->state }}</td>
                <td>{{ $location->country }}</td>
                <td class="text-center">
                	@if($location->status == 'ACCEPTED')
                		<span class="badge badge-success">{{ $location->status }}</span>
                	@elseif($location->status == 'PENDING')
                		<span class="badge badge-warning">{{ $location->status }}</span>
                	@else
                		<span class="badge badge-danger">{{ $location->status }}</span>
                	@endif
              	</td>

                <td class="d-flex justify-content-around">
                  <a href="{{route('admin.locations.edit',$location->id)}}" class="float-left">
                    <button type="submit" class="btn btn-primary">{{__('Editar')}}</button>
                  </a>
                  <form action="{{route('admin.locations.destroy',$location->id)}}" method="POST" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Desea Eliminar?')">{{__('Borrar')}}</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
					</div>
				</div>
			</div>
		</div>
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
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 
</script>
@endsection