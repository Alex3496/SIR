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
          <h3 class="card-title">{{ __('Entradas') }}</h3>
          <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary float-right">Nuevo</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">Id</th>
                <th>Titulo</th>
                <th style="width: 200px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td class="d-flex justify-content-around">
                  <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-primary btn-sm">Editar</a>
                  <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('Desea Eliminar?')"/>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center mt-2">
            {{$posts->render()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
