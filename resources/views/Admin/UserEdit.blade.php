@extends('layouts.dashboardAdmin.dashboard')
@section('extraCss')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}"/>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"/>
@endsection
@section('content')
<section class="content">
  <div class="row">
    <div class="col-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit User: {{ $user->name }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.users.update',$user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}"/>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ old('emial',$user->email) }}"/>
            </div>
            @foreach($roles as $role)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}"
              @if($user->roles->pluck('id')->contains($role->id)) checked @endif
              >
              <label class="form-check-label" >{{$role->name}}</label>
            </div>
            @endforeach

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
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
    $('#example2').DataTable({
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
