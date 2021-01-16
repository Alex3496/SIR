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
            {!! Form::open(['route' => 'admin.petitions.list', 'method' => 'GET']) !!}
              <div class="row">
                <div class="col-md mb-2">
                  {!! Form::text('origin',$origin,['class' => 'form-control', 'placeholder' => 'Ciudad Origen']) !!}
                </div>
                <div class="col-md mb-2">
                  {!! Form::text('destiny',$destiny,['class' => 'form-control', 'placeholder' => 'Ciudad Destino']) !!}
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
    <div class="col-md-12">
      <!--start card User List-->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ __('Peticiones Regsitradas') }}: {{$petitions->total()}}</h3>
        </div>
        <div class="card-body table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>{{__('Origen')}}</th>
                <th>{{__('Destino')}}</th>
                <th>{{__('Empresa')}}</th>
                <th>{{__('Precio')}}</th>
                <th>{{__('Acciones')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($petitions as $petition)
              <tr>
                <td>{{ $petition->id }}</td>
                <td>{{ $petition->complete_origin }}</td>
                <td>{{ $petition->complete_destiny }}</td>
                <td>{{ $petition->user->company_name }}</td>
                <td>{{ $petition->rate }} <small>{{$petition->currency}}</small> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-12 center">
           {{ $petitions->withQueryString()->links() }}
          </div>
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
      "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
    });
  }); 
</script>
@endsection