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
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <div class="row">
            <label class="col-sm-3 col-form-label">{{ __('Total Tarifas') }}</label>
            <div class="col d-flex justify-content-between">
              <div class="form-control col-8 no-border">
                <p>{{ $totalTariffs }}</p>
              </div>
              @if($totalTariffs > 0)
                <a href="{{route('admin.users.show',$userToEdit->id)}}" class="btn btn-outline-dark mr-4">{{ __('Ver') }} </a>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- card Profile -->
        @include('Admin.Users.cards.profile')
      <!-- /card Profile -->
      
      <!-- card Perfil Usuario-->
        @include('Admin.Users.cards.company')
      <!-- /card -->

      <!-- card Certificado de seguro-->
        @include('Admin.Users.cards.insurance')
      <!-- /card -->

    </div>

    <div class="col-lg-6">

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
