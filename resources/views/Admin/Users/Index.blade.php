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
  <div class="row">
    <div class="col-12">
      <!--start card User List-->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ __('Lista de Tarifas') }}</h3>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>{{__('Nombre')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Rol')}}</th>
                <th>{{__('Acciones')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                  <!--@foreach($user->roles as $role)
                  {{ $role->name }}
                  @endforeach-->

                <td>
                  <a href="{{ route('admin.users.edit',$user->id) }}" class="float-left">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </a>
                  <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
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