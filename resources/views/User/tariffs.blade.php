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
    <div class="col-11">
      <h2 class="mb-4">{{ __('Mis tarifas') }}</h2>
    </div>
  </div>
  <!--start row card Add Tariff-->
  <div class="row">
    <div class="col-11">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
              <i class="icon fas fa-check"> </i>
                {{__('Exito')}}
            </h5>
            <p>{{ session('status') }}</p>
          </div>
      @endif
      <!--start card-->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">
            @if(isset($tariffToUpdate))
              {{ __('Editar Tarifa') }}
            @else
              {{ __('Agegar Tarifa') }}
            @endif
            
          </h3>
        </div>
        <div class="card-body">
          @if(isset($tariffToUpdate))
          <form action="{{ route('tariffs.update',$tariffToUpdate->id) }}" method="POST">
            @method('PUT')
            @else
            <form action="{{ route('tariffs.store') }}" method="POST">
              @endif
              @csrf
              <div class="form">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="origin">{{ __('Origen') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="origin" name="origin" required value="{{ old('origin',$tariffToUpdate->origin ?? '') }}"/>
                      </div>
                      @error('origin')
                      <br/>
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="destiny">{{ __('Destino') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="destiny"  name="destiny" value="{{ old('destiny',$tariffToUpdate->destiny ?? '') }}"/>
                      </div>
                      @error('origin')
                      <br/>
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="date">{{ __('Fecha') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="date" class="form-control" id="date" name="date"  value="{{ old('date',$tariffToUpdate->date ?? '') }}"/>
                      </div>
                      @error('date')
                      <small class="mt-0" style="color:red">
                        <i>{{ $message }}</i>
                      </small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label for="weight">{{ __('Peso') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="weight" name="weight"  value="{{ old('weight',$tariffToUpdate->weight ?? '') }}"/>
                      </div>
                      @error('weight')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="distance">{{ __('Millas') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="distance" name="distance"  value="{{ old('distance',$tariffToUpdate->distance ?? '') }}"/>
                      </div>
                      @error('distance')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="type_equipment">{{ __('Tipo de equipo') }}</label>
                      <div class="input-group input-group-sm">
                        <select class="form-control" id="type_equipment" name="type_equipment">
                          <option value="platform" @if(old('type_equipment') == 'platform')selected @endif
                            @if(isset($tariffToUpdate))
                              @if($tariffToUpdate->type_equipment == 'platform')
                                selected
                              @endif
                            @endif>
                            {{ __('Plataforma') }}
                          </option>
                          <option value="dry box" @if(old('type_equipment') == 'dry box')selected @endif
                            @if(isset($tariffToUpdate))
                              @if($tariffToUpdate->type_equipment == 'dry box')
                                selected
                              @endif
                            @endif>
                            {{ __('Caja Seca') }}
                          </option>
                          <option value="refrigerated box" @if(old('type_equipment') == 'refrigerated box')selected @endif
                            @if(isset($tariffToUpdate))
                              @if($tariffToUpdate->type_equipment == 'refrigerated box')
                                selected
                              @endif
                            @endif>
                            {{ __('Caja Refigerada') }}
                          </option>
                          <option value="sea ​​container" @if(old('type_equipment') == 'sea ​​container')selected @endif
                          @if(isset($tariffToUpdate))
                              @if($tariffToUpdate->type_equipment == 'sea ​​container')
                                selected
                              @endif
                            @endif>
                            {{ __('Contenedor maritimo') }}
                          </option>
                        </select>
                      </div>
                      @error('type_equipment')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-11">
                    <button class="btn btn-info float-right" type="submit">Aceptar</button>
                    @if(isset($tariffToUpdate))
                      <a class="btn btn-danger float-right mr-2" href="{{route('tariffs.index')}}"> Cancel </a>
                    @endif
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--/end card-->
      </div>
    </div>
    <!--/End row card Add Tariff-->
    <!--Start row Tariff List-->
    <div class="row">
      <div class="col-12">
        <!--start card-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __('Lista de Tarifas') }}</h3>
          </div>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>{{ __('Origen') }}</th>
                  <th>{{ __('Destino') }}</th>
                  <th>{{ __('Fecha') }}</th>
                  <th>{{ __('Peso') }}</th>
                  <th>{{ __('Millas') }}</th>
                  <th>{{ __('Tipo de equipo') }}</th>
                  <th>{{ __('Acciones') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tariffs as $tariff)
                <tr>
                  <td>{{ $tariff->origin }}</td>
                  <td>{{ $tariff->destiny }}</td>
                  <td>{{ $tariff->date }}</td>
                  <td>{{ $tariff->weight }}</td>
                  <td>{{ $tariff->distance }}</td>
                  <td>{{ $tariff->type_equipment }}</td>
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
                        <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('{{__("Desea Eliminar?")}}')">Delete</button>
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
  @endsection
