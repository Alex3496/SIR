@extends('layouts.dashboardAdmin.dashboard')
@section('extraCss')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="container-fluid">
  <!--Start row User List-->
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            {!! Form::open(['route' => 'admin.tariffs.list', 'method' => 'GET']) !!}
              <div class="row">
                <div class="col-md-3 mb-2">
                  {!! Form::text('origin',$origin,['class' => 'form-control', 'placeholder' => 'Ciudad Origen']) !!}
                </div>
                <div class="col-md-3 mb-2">
                  {!! Form::text('destiny',$destiny,['class' => 'form-control', 'placeholder' => 'Ciudad Destino']) !!}
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    {!!  Form::select('type[]', [
                      'Dry Box 48 ft'    => 'Caja seca 48 pies', 
                      'Dry Box 53 ft'    => 'Caja seca 53 pies',
                      'Refrigerated Box 53 ft'   => 'Caja Refrigerada 53 pies',
                      'Plataform 48 ft'  => 'Plataforma 48 pies',
                      'Plataform 53 ft'  => 'Plataforma 53 pies',
                      'Container 20 ft'  => 'Contenedor 20 pies',
                      'Container 40 ft'  => 'Contenedor 40 pies',
                      'Container 40 ft High cube' => 'Contenedor 40 pies High cube',], 
                        $type ?? null, ['class' => 'select2bs4', 'multiple' => 'multiple','data-placeholder' => 'Equipo', 'style' => 'width:100%; max-height: 38px; ']); !!}
                  </div>
                </div>
                <div class="col-md-2 mb-2">
                  {!! Form::date('fecha',$fecha ?? null,['class' => 'form-control']) !!}
                </div>
                <div class="col-md">
                  <button type="submit" class="btn btn-primary col">
                    <img src="{{ asset('images/logos/search.svg') }}" height="20px" />
                  </button>
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
          <h3 class="card-title">{{ __('Tarifas Regsitradas') }}: {{$tariffs->total()}}</h3>
        </div>
        <div class="card-body table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>{{__('Origen')}}</th>
                <th>{{__('Destino')}}</th>
                <th>{{__('Equipo')}}</th>
                <th>{{__('Fecha de Envio')}}</th>
                <th>{{__('Empresa')}}</th>
                <th>{{__('Acciones')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tariffs as $tariff)
              <tr>
                <td>{{ $tariff->complete_origin }}</td>
                <td>{{ $tariff->get_destiny }}</td>
                <td>{{ $tariff->get_type_equipment }}</td>
                <td>{{ $tariff->end_date }}</td>
                <td>{{ $tariff->user->company_name }}</td>
               <!--  <td>{{ $tariff->rate }} <small>{{$tariff->currency}}</small> </td> -->
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-12 center">
           {{ $tariffs->withQueryString()->links() }}
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
<!-- Select2 -->
<script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {

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

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
@endsection