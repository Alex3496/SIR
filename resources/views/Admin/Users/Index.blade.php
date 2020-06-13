@extends('layouts.dashboardAdmin.dashboard')
@section('extraCss')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection
@section('content')
<div class="container-fluid">
  <!--Start row User List-->
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="card">
          <div class="card-body">
            {!! Form::open(['route' => 'admin.users.find', 'method' => 'GET']) !!}
              <div class="row">
                <div class="col-md mb-2">
                  {!! Form::text('company_name',null,['class' => 'form-control', 'placeholder' => 'Nombre de la Empresa']) !!}
                </div>
                <div class="col-md mb-2">
                  {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
                <div class="col-md mb-2">
                  {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Correo']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::submit('Buscar',['class' => 'btn btn-primary col']) !!}
                </div>
              </div>
            {!! Form::close() !!}
          </div>  
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
    <div class="col-md-11">
      <!--start card User List-->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ __('Lista de Usuarios') }}</h3>
          <div class="card-tools">
            <a href="{{ route('admin.users.create') }}" class="btn btn-secondary mr-3">{{__('Crear Usuario')}}</a>
          </div>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>{{__('Tipo de Empresa')}}</th>
                <th>{{__('nombre de la Empresa')}}</th>
                <th>{{__('Nombre')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Rol')}}</th>
                <th>{{__('Acciones')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $userB)
              <tr>
                <td>{{ $userB->id }}</td>
                <td>{{ $userB->type_company_user }}</td>
                <td>{{ $userB->company_name }}</td>
                <td>{{ $userB->name }}</td>
                <td>{{ $userB->email }}</td>
                <td>{{implode(', ',$userB->roles()->get()->pluck('name')->toArray())}}</td>
                  <!--@foreach($user->roles as $role)
                  {{ $role->name }}
                  @endforeach-->

                <td class="d-flex justify-content-around">
                  <a href="{{ route('admin.users.edit',$userB->id) }}" class="float-left">
                    <button type="submit" class="btn btn-primary">{{__('Editar')}}</button>
                  </a>
                  <form action="{{ route('admin.users.destroy',$userB) }}" method="POST" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{__('Borrar')}}</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!--/end card-->
    </div>
  </div>
  <!--/End row Tariff List-->
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
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 
</script>
@endsection