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
          <h3 class="card-title">{{ __('Crear nueva entrada') }}</h3>
          <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-danger float-right">{{__('Cancelar')}}</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         	<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
         		@csrf
        		@include('Admin.posts.partials.form')
         	</form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('extraScript')
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">

    CKEDITOR.replace( 'body' );
</script>
@endsection

