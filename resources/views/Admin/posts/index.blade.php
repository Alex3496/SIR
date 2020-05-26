@extends('layouts.dashboardAdmin.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          Articulos
          <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary float-right">Nuevo</a>
        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">{{ session('status') }}</div>
          @endif
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>User</th>
                <th>User name</th>
                <th colspan="2">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                  <a href="{{ route('admin.posts.edit',$post) }}" class="btn btn-primary btn-sm">Editar</a>
                </td>
                <td>
                  <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('Desea Eliminar?')"/>
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
