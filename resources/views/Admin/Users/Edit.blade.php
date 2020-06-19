@extends('layouts.dashboardAdmin.dashboard')
@section('content')
<section class="container-fluid">


  <h2 class="text-center mb-4">{{ __('Información del usuario ID: ') . $userToEdit->id . ' ' . $userToEdit->name }}</h2>


  <div class="row">
    <div class="col">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>Exito</h5>
          <p>{{ session('status') }}</p>
        </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </div>
  </div>

  <!-- row -->
  <div class="row">
    <div class="col-md-6">

      <!-- card Profile -->
        @include('Admin.Users.cards.profile')
      <!-- /card Profile -->
      
      <!-- card Perfil Usuario-->
        @include('Admin.Users.cards.company')
      <!-- /card -->

      <!-- card Certificado de seguro-->
        @include('Admin.Users.cards.insurance')
      <!-- /card -->

      <!-- card info basica-->
      <div class="card card-warning">
        <div class="card-header" data-card-widget="collapse">
          <h2 class="card-title">{{__('Info basica')}}</h2>  
        </div>
        <div class="card-body">
          <form action="{{ route('admin.users.update',$userToEdit) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">{{__('Nombre')}}</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$userToEdit->name) }}"/>
            </div>

            <div class="form-group">
              <label for="email">{{__('Email')}}</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ old('emial',$userToEdit->email) }}"/>
            </div>
            @foreach($roles as $role)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}"
              @if($userToEdit->roles->pluck('id')->contains($role->id)) checked @endif>
              <label class="form-check-label" >{{$role->name}}</label>
            </div>
            @endforeach

            <div class="form-group row mt-4">
              <button type="submit" class="btn btn-primary btn-block">{{__('Actualizar')}}</button>
            </div>
            
          </form>
        </div>
      </div>
      <!-- /card -->

    </div>

    <div class="col-md-6">

      <!-- card info compañia-->
      @include('Admin.Users.cards.dataset')
      <!-- /card -->

    </div>
  </div>
  <!-- /row -->
</section>
@endsection
@section('extraScript')
<script type="text/javascript">

 function disable(id){
  
    if(document.getElementById(id).disabled)
    {
       document.getElementById(id).disabled = false;
    }
    else if(!document.getElementById(id).disabled)
    {
      document.getElementById(id).disabled = true;
    }

  }
</script>

<script>  
$(function(){
  $('#country').on('change',onSelectCountry);
});

function onSelectCountry() {
  var country_code = $(this).val();

  var url = "{{url('/')}}"+'/api/country/'+country_code+'/states';

  $.get(url,function(data) {
    console.log(data);
    var html_select = '';
    Object.keys(data).forEach(function(key) {
        html_select += '<option value = "'+key+'">'+data[key]+'</option>'; 
    })
    $('#state').html(html_select);
  });
}

</script>

@endsection
