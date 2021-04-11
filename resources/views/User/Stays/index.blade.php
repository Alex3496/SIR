@extends('layouts.dashboardUser.dashboard')
@section('extraCss')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"/>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<h2 class="mb-4">{{ __('Control de Estancias') }}</h2>
		</div>
	</div>

	<!--Alert-->
	<div class="row">
		<div class="col-md-11">
			@if (session('status'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>{{ __('Exito') }}</h5>
				<p>{{ session('status') }}</p>
			</div>
			@endif
		</div>
	</div>

	<div class="row d-flex justify-content-center">
		<div class="col-md-12">
			<div class="card card-info">
				<div class="card-header">
					<h2 class="card-title">Estancias</h2>
					<div class="card-tools">
            			<a href="{{ route('stays.create') }}" class="btn btn-secondary mr-3">{{__('Crear nueva estancia')}}</a>
          			</div>
				</div>
				<div class="card-body table-responsive">
					<table id="example2" class="table table-bordered table-hover">
			            <thead>
			              <tr>
			                <th>{{_('Check in')}}</th>
			                <th>{{__('Check out')}}</th>
			                <th>{{__('Horas Libres')}}</th>
			                <th>{{__('Tipo')}}</th>
			                <th>{{__('Coste / Hora ')}}</th>
			                <th>{{__('Operador')}}</th>
			                <th>{{__('Acciones')}}</th>
			              </tr>
			            </thead>
			            <tbody>
			              @foreach($stays as $stay)
			              <tr>
			                <td>{{ $stay->check_in }} - {{ $stay->check_in_hours }} </td>
			                <td>{{ $stay->check_out }} - {{ $stay->check_out_hours }} </td>
			                <td>{{ $stay->free_hours }}</td>
			                <td>{{ $stay->get_type }}</td>
			                <td>$ {{ $stay->cost_hour }}</td>
			                <td>{{ $stay->operator }}</td>
			              	 <td class="d-flex justify-content-around">
			                  <a href="{{route('stays.edit',$stay->id)}}" class="float-left">
			                    <button type="submit" class="btn btn-primary btn-edit">
				                  <img src="{{ asset('images/icons/edit.svg') }}" alt="edit">
				                </button>
			                  </a>
			                  <form action="{{route('stays.destroy',$stay)}}" method="POST" class="float-left">
			                    @csrf
			                    @method('DELETE')
			                    <button type="submit" class="btn btn-danger btn-delete" onclick="return confirm('Desea Eliminar?')">
			                    	<img src="{{ asset('images/icons/delete.svg') }}" alt="delete">
			                    </button>
			                  </form>
			                </td>
			              </tr>
			              @endforeach
			            </tbody>
			          </table>
					</div>
					<div class="row">
			            <div class="col-12 center">
			              {{ $stays->links() }}
			            </div>
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