@extends('layouts.base')
@section('content')
<div class="container-md container-results">
  <div class="row">
    <div class="col">
      <div class="card mt-2 mb-2 p-2">
        {!! Form::open(['route' => 'equipment', 'method' => 'GET']) !!}
          <div class="row">
            <div class="col-md-10">
              <div class="form-group row mb-0">
                {!! Form::label('type', 'Seleccione el tipo de Equipo:',['class' => 'col-sm-3 col-form-label']) !!}
                <div class="col-sm-5">
                  <div class="input-group-sm">
                  {!!  Form::select('type', [
                  'Dry Box 48 ft'    => 'Caja seca 48 pies', 
                  'Dry Box 53 ft'    => 'Caja seca 53 pies',
                  'Refrigerated Box 53 ft'   => 'Caja Refrigerada 53 pies',
                  'Plataform 48 ft'  => 'Plataforma 48 pies',
                  'Plataform 53 ft'  => 'Plataforma 53 pies',
                  'Container 20 ft'  => 'Contenedor 20 pies',
                  'Container 40 ft'  => 'Contenedor 40 pies',
                  'Container 40 ft High cube' => 'Contenedor 40 pies High cube',
                  'Panel'  => 'Panel',
                  'Rabon'  => 'Rabon',
                  'Torton'  => 'Torton',
                  'Cama Z'  => 'Cama Z',
                  'Cama baja'  => 'Cama baja',
                  'Lowboy'  => 'Lowboy',], 
                    $type ?? null, ['style' => 'width:100%; max-height: 38px;']); !!}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md center">
              <button type="submit" class="btn btn btn-SIR">
                Buscar <img src="{{ asset('images/logos/search.svg') }}" height="20px" />
              </button>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card-body" style="padding-left: 0px; padding-right: 0px">
        <div class="row">
          <div class="col-12 center mb-5">
            <h3 class="">Equipos Disponibles</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label>{{ __('Equipos Regsitrados') }}: {{$equipments->total()}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Tipo</th>
                  <th scope="col">Empresa</th>
                  <th scope="col">Disponible hasta:</th>
                  <th scope="col">Contacto</th>
                </tr>
              </thead>
              <tbody>
                @foreach($equipments as $equipment)
                <tr>
                  <td>{{ $equipment->get_type_equipment }}</td>
                  <td>{{ $equipment->user->company_name }}</td>
                  <td>{{ $equipment->end_date }} {{$equipment->end_hour}}</td>
                  <td>{{ $equipment->user->phone }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>  
        </div>
        <div class="row">
          <div class="col-12 center">
           {{ $equipments->withQueryString()->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
@section('scripts')

@endsection