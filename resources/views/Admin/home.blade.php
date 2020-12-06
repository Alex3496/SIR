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
  @include('layouts.alerts.emailVerifyAlert')
  <!--Start row User List-->
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$usersCount}}</h3>

          <p>Usuarios Totales</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$usersMonth}}</h3>

          <p>Usuarios último mes</p>
        </div>
        <div class="icon">
          <i class="fas  fa-calendar"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$tariffsCount}}</h3>

          <p>Tarifas Registradas</p>
        </div>
        <div class="icon">
          <i class="fas  fa-truck"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$petitionCount}}</h3>

          <p>Peticiones Registradas</p>
        </div>
        <div class="icon">
          <i class="fas fa-map-pin"></i>
        </div>
      </div>
    </div>        
  </div>
  <!--/End row Tariff List-->
  <div class="row">
    <div class="col-md-1 center">
      <img src="{{ asset('images/logos/ubicacion.png') }}" class="serch-img"/>
    </div>
    <div class="col-md-3 center">
      <h3>Ruta más transitada</h3>
    </div>
    <div class="col-md-6 mb-4 d-flex align-items-center">
        <div class=" text-center-md ml-2 mt-2" style="width: 85%; ">
          <div style="height: 50%">
            <b>Origen:</b>
              {{$tariffMostUsed->origin ?? '-'}}, {{$tariffMostUsed->origin_state ?? '-'}}, {{$tariffMostUsed->origin_country ?? '-'}}
          </div>
          <div class="mt-2">
            <b>Destino:</b>
              {{$tariffMostUsed->destiny ?? '-' }}, {{$tariffMostUsed->destiny_state ?? '-' }}, {{$tariffMostUsed->destiny_country ?? '-'}}
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
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 
</script>
@endsection