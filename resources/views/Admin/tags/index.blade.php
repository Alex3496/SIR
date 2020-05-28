@extends('layouts.dashboardAdmin.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>Exito</h5>
          <p>{{ session('status') }}</p>
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ __('Etiquetas') }}</h3>
          <a href="{{ route('admin.tags.create') }}" class="btn btn-sm btn-primary float-right">Nueva</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">Id</th>
                <th>Etiqueta</th>
                <th style="width: 200px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
              <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td class="d-flex justify-content-around">
                  <a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-primary btn-sm">Editar</a>
                  <form action="{{ route('admin.tags.destroy',$tag->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('Al Eliminar una etiqueta se eliminaran los articulos que estan relacionados a ella, Desea Eliminar?')"/>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
