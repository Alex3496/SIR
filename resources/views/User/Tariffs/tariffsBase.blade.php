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
      <h2 class="mb-4">{{ __('Mis tarifas') }}</h2>
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

  <!-- card -->
    @yield('tariffCard')
  <!-- /card -->


  <!--Start row Tariff List-->
  <div class="row">
    <div class="col-12">
      <!--start card-->
      <div class="card" id="card-tariffs-list">
        <div class="card-header">
          <h3 class="card-title">{{ __('Lista de Tarifas') }}</h3>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>{{ __('Tipo de transporte') }}</th>
                <th>{{ __('Origen') }}</th>
                <th>{{ __('Destino') }}</th>
                <th>{{ __('Fecha') }}</th>
                <th>{{ __('Peso') }}</th>
                <th>{{ __('Distancia') }}</th>
                <th>{{ __('Tipo de equipo') }}</th>
                <th>{{ __('Tarifas') }}</th>
                <th>{{ __('Acciones') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tariffs as $tariff)
              <tr>
                <td>{{ $tariff->type_tariff }}</td>
                <td>{{ $tariff->origin }}</td>
                <td>{{ $tariff->destiny }}</td>
                <td>{{ $tariff->created_at->format('d-m-Y') }}</td>
                <td>{{ $tariff->min_weight }} - {{ $tariff->max_weight }} {{ $tariff->type_weight }}</td>
                <td>{{ $tariff->distance }}</td>
                <td>{{ $tariff->type_equipment }}</td>
                <td>$ {{ $tariff->rate }}</td>
                <td>
                  <div>
                    <!-- Edit button -->
                    <a href="{{ route('tariffs.edit',$tariff->id) }}" class="d-inline">
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </a>
                    <!-- Delete button -->
                    <form action="{{ route('tariffs.destroy',$tariff->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __("Desea Eliminar?") }}')">Delete</button>
                    </form>
                  </div>
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
<script>
  function checked()
  {
    if(document.getElementById("maritime").checked == true){
      hide();
    }else if(document.getElementById("truck").checked == true){
      show();
    }else if(document.getElementById("train").checked == true){
      show();
    }else if(document.getElementById("aerial").checked == true){
      show();
    }      
  }
  
  function hide()
  {
    var x = document.getElementsByClassName("hide");
    for(var i=0; i<x.length; i++)
    {
      x[i].style.display="none";
    }  
  }
      
  function show()
  {
    var x = document.getElementsByClassName("hide");
    for(var i=0; i<x.length; i++)
    {
      x[i].style.display="block";
    }  
  }
  
  document.onload = checked();
  
</script>
@endsection
