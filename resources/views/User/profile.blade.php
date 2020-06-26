@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-10">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Exito</h5>
        <p>{{ session('status') }}</p>
      </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i>Alerta</h5>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('errorPassword'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i>Alerta</h5>
        <p>{{ session('errorPassword') }}</p>
      </div>
    @endif

    </div>
  </div>


  <div class="row">
    <div class="col-lg-7">

      <!-- profile card -->
        @include('layouts.cards.personalInfo')
      <!-- /card -->

      <!-- company card -->
        @include('layouts.cards.company')
      <!-- /card -->
    </div>
    <div class="col-xl-3">
      
      @include('layouts.cards.avatar')

    </div>
  </div>
</div>

<!-- Modal -->
  @include('layouts.modals.name')

  @include('layouts.modals.phone')

  @include('layouts.modals.email')

  @include('layouts.modals.password')

  @include('layouts.modals.position')

@endsection

@section('extraScript')
  <script src="{{asset('js/countries.js')}}"></script>
@endsection
