@extends('layouts.dashboardUser.dashboard')
@section('extraCss')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
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
    <div class="col-md-11">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5>
          <i class="icon fas fa-check"> </i>
          {{ __('Exito') }}
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
          <!-- form -->
          @if(isset($tariffToUpdate))
          <form action="{{ route('tariffs.update',$tariffToUpdate->id) }}" method="POST">
            @method('PUT')
            @else
            <form action="{{ route('tariffs.store') }}" method="POST">
              @endif
              @csrf
              <div class="form">

                <!-- radio row 1-->
                <diV class="form-group mb-4 d-flex flex-column flex-sm-row">
                  <label class="mb-0">{{__('Tipo de transporte') }}</label>
                  <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="type_tariff" id="truck" value="truck" checked=""  onchange ="show()"
                    {{ (old('type_tariff') == 'truck') ? 'checked' : '' }}
                    @if(isset($tariffToUpdate)) 
                      @if($tariffToUpdate->type_tariff == 'truck')
                        checked
                      @endif
                    @endif/>
                    <label class="form-check-label" for="truck">{{__('Camión')}}</label>
                  </div>
                  <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="type_tariff" id="train" value="train" onchange ="show()"
                    {{ (old('type_tariff') == 'train') ? 'checked' : '' }}
                    @if(isset($tariffToUpdate)) 
                      @if($tariffToUpdate->type_tariff == 'train')
                        checked
                      @endif
                    @endif/>
                    <label class="form-check-label" for="train">{{__('Tren')}}</label>
                  </div>
                  <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="type_tariff" id="maritime" value="maritime" onchange ="hide()"
                    {{ (old('type_tariff') == 'maritime') ? 'checked' : '' }}
                    @if(isset($tariffToUpdate)) 
                      @if($tariffToUpdate->type_tariff == 'maritime')
                        checked
                      @endif
                    @endif/>
                    <label class="form-check-label" for="maritime">{{__('Marítimo')}}</label>
                  </div>
                  <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="type_tariff" id="aerial" value="aerial" onchange ="show()"
                    {{ (old('type_tariff') == 'aerial') ? 'checked' : '' }}
                    @if(isset($tariffToUpdate)) 
                      @if($tariffToUpdate->type_tariff == 'aerial')
                        checked
                      @endif
                    @endif/>
                    <label class="form-check-label" for="aerial">{{__('Aéreo')}}</label>
                  </div>
                </div>
                @error('type_tariff')
                  <small class="mt-0" style="color:red">{{ $message }}</small>
                @enderror
                <!-- /radio row 1-->

                <!-- card row 2-->
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="origin">{{ __('Origen') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="origin" name="origin" required
                          value="{{ old('origin',$tariffToUpdate->origin ?? '') }}" />
                      </div>

                      @error('origin')
                      <br />
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror

                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="destiny">{{ __('Destino') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="destiny" name="destiny"
                          value="{{ old('destiny',$tariffToUpdate->destiny ?? '') }}" />
                      </div>
                      @error('destiny')
                      <br />
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="date">{{ __('Fecha') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="date" class="form-control" id="date" name="date"
                          value="{{ old('date',$tariffToUpdate->date ?? '') }}" />
                      </div>
                      @error('date')
                      <small class="mt-0" style="color:red">
                        <i>{{ $message }}</i>
                      </small>
                      @enderror
                    </div>
                  </div>
                   <div class="col-sm-2 hide">
                    <div class="form-group">
                      <label for="min_weight">{{ __('Peso min.') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="min_weight" name="min_weight"
                          value="{{ old('min_weight',$tariffToUpdate->min_weight ?? '') }}" />
                      </div>
                      @error('min_weight')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-2 hide">
                    <div class="form-group">
                      <label for="max_weight">{{ __('Peso max.') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="max_weight" name="max_weight"
                          value="{{ old('max_weight',$tariffToUpdate->max_weight ?? '') }}" />
                      </div>
                      @error('max_weight')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-1 d-flex align-items-end hide" >
                    <div class="form-check ml-2 mb-4 hide">
                      <input class="form-check-input" type="radio" name="type_weight" id="kilo" value="kg" checked
                      {{ (old('type_weight') == 'kilo') ? 'checked' : '' }}
                      @if(isset($tariffToUpdate)) 
                        @if($tariffToUpdate->type_weight == 'kilo')
                          checked
                        @endif
                      @endif />
                      <label class="form-check-label" for="kilo">Kg.</label>
                    </div>
                    <div class="form-check ml-2 mb-4 hide">
                      <input class="form-check-input" type="radio" name="type_weight" id="pounds" value="lb"  
                      {{ (old('type_weight') == 'pounds') ? 'checked' : '' }}
                      @if(isset($tariffToUpdate)) 
                        @if($tariffToUpdate->type_weight == 'pounds')
                          checked
                        @endif
                      @endif/>
                      <label class="form-check-label" for="pounds">Lb.</label>
                    </div>
                    @error('Type_weigh')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                    @enderror
                  </div> 
                </div>
                <!--/card row 2-->

                <!--card row 3-->
                <div class="row">
                  <div class="col-md-2 hide">
                    <div class="form-group">
                      <label for="distance">{{ __('Millas') }}</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="distance" name="distance"
                          value="{{ old('distance',$tariffToUpdate->distance ?? '') }}" />
                      </div>
                      @error('distance')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="type_equipment">{{ __('Tipo de equipo') }}</label>
                      <div class="input-group input-group-sm">
                        <select class="form-control" id="type_equipment" name="type_equipment">
                          <option value="platform" @if(old('type_equipment')=='platform' )selected @endif
                            @if(isset($tariffToUpdate)) @if($tariffToUpdate->
                            type_equipment == 'platform')
                            selected
                            @endif
                            @endif>
                            {{ __('Plataforma') }}
                          </option>
                          <option value="dry box" @if(old('type_equipment')=='dry box' )selected @endif
                            @if(isset($tariffToUpdate)) @if($tariffToUpdate->
                            type_equipment == 'dry box')
                            selected
                            @endif
                            @endif>
                            {{ __('Caja Seca') }}
                          </option>
                          <option value="refrigerated box" @if(old('type_equipment')=='refrigerated box' )selected
                            @endif @if(isset($tariffToUpdate)) @if($tariffToUpdate->
                            type_equipment == 'refrigerated box')
                            selected
                            @endif
                            @endif>
                            {{ __('Caja Refigerada') }}
                          </option>
                          <option value="sea ​​container" @if(old('type_equipment')=='sea ​​container' )selected @endif
                            @if(isset($tariffToUpdate)) @if($tariffToUpdate->type_equipment == 'sea ​​container')
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
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="rate">{{ __('Tarifa') }} <small style="color:gray">dlls.</small></label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="rate" name="rate"
                          value="{{ old('rate',$tariffToUpdate->rate ?? '') }}" />
                      </div>
                      @error('rate')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>  
                </div>
                <!--/card row 3-->

                <!--card row 4-->
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="collection_Address">{{ __('Dirección de recolección') }} </label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="collection_Address" name="collection_Address"
                          value="{{ old('collection_Address',$tariffToUpdate->collection_Address ?? '') }}" />
                      </div>
                      @error('collection_Address')
                      <small class="mt-0" style="color:red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>  
                </div> 
                <!--/card row 4-->
                <div class="row">
                  <div class="col-11">
                    <button class="btn btn-info float-right" type="submit">{{__('Aceptar')}}</button>
                    @if(isset($tariffToUpdate))
                    <a class="btn btn-danger float-right mr-2" href="{{ route('tariffs.index') }}">{{__('Cancelar')}}</a>
                    @endif
                  </div>
                </div>
              </div>
            </form>
            <!-- /form -->
        </div>
      </div>
      <!--/end card-->
    </div>
  </div>
  <!--/End row card Add Tariff-->

  <!--Start row Tariff List-->
  <div class="row">
    <div class="col-12" >
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
                <td>{{ $tariff->date }}</td>
                <td>{{ $tariff->min_weight }} - {{ $tariff->max_weight }} {{$tariff->type_weight}}</td>
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
                      <button type="submit" class="btn btn-danger"
                        onclick="return confirm('{{ __("Desea Eliminar?") }}')">Delete</button>
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