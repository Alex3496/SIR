@extends('layouts.dashboardUser.dashboard')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
       @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"> </i>
            Exito
          </h5>
          <p>{{ session('status') }}</p>
        </div>
        @endif
      <div class="card">
        <div class="card-header" style="background-color:#343a40; color: white">
          <h2 class="card-title">{{ __('Informacion empresarial') }}</h2>
        </div>
        <div class="card-body">
          <!-- START FORM-->
          <form action="{{route('profile.companyStore')}}" method="POST">
            @csrf
            <!--BDA Name -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="dba_name">{{ __('Nombre BDA') }}</label>
                  <input class="form-control" type="text" id="dba_name" name="dba_name" value="{{ old('dba_name', $dataset->dba_name ?? '') }}"/>
                  @error('dba_name')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--Scac code -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="scac_code">{{ __('Código Scac') }}</label>
                  <input class="form-control" type="text" id="scac_code" name="scac_code" value="{{ old('scac_code',$dataset->scac_code ?? '') }}"/>
                  @error('scac_code')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--CAAT -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="caat">{{ __('CAAT') }}</label>
                  <input class="form-control" type="text" id="caat" name="caat" value="{{ old('caat',$dataset->caat ?? '') }}"/>
                  @error('caat')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--mc_number -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="mc_number">{{ __('Numero MC') }}</label>
                  <input class="form-control" type="text" id="mc_number" name="mc_number" value="{{ old('mc_number', $dataset->mc_number ?? '') }}"/>
                  @error('mc_number')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--num_trucks -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="num_trucks">{{ __('Numero de camiones') }}</label>
                  <input class="form-control" type="text" id="num_trucks" name="num_trucks" value="{{ old('num_trucks', $dataset->num_trucks ?? '') }}"/>
                  @error('num_trucks')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

             <!--certificate_ctpat -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="certificate_ctpat">{{ __('Certificado CTPAT') }}</label>
                   <!-- radio -->
                  <div class="form-group row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasCTPAT" checked="" id="no_ctpat" onchange="disable('certificate_ctpat')" value="off" />
                      <label class="form-check-label" for="no_ctpat">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasCTPAT" 
                      id="yes_ctpat" 
                      onchange="disable('certificate_ctpat')" 
                      value="on" 
                          @if(isset($dataset->certificate_ctpat))
                            checked
                          @endif 
              
                      />
                      <label class="form-check-label" for="yes_ctpat">{{__('Si')}}</label>
                    </div>                
                  </div>
                  <input class="form-control" type="text" id="certificate_ctpat" name="certificate_ctpat" 
                  value="{{ old('certificate_ctpat', $dataset->certificate_ctpat ?? '') }}" 
                   @if(!isset($dataset->certificate_ctpat))
                      disabled
                    @endif  
                  />

                  @error('certificate_ctpat')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--certificate_oae -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="certificate_oae">{{ __('Certificado OAE') }}</label>
                  <div class="form-group row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasOAE" checked="" id="no_OAE" onchange="disable('certificate_oae')" value="off" />
                      <label class="form-check-label" for="no_OAE">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasOAE" id="yes_OAE" onchange="disable('certificate_oae')" value="on"
                        @if(isset($dataset->certificate_oae))
                            checked
                          @endif 
                      />
                      <label class="form-check-label" for="yes_OAE">{{__('Si')}}</label>
                    </div>                
                  </div>
                  <input class="form-control" type="text" id="certificate_oae" name="certificate_oae" value="{{ old('certificate_oae', $dataset->certificate_oae ?? '') }}"  
                  @if(!isset($dataset->certificate_oae))
                      disabled
                    @endif />
                  @error('certificate_oae')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--fast -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fast">{{ __('Fast') }}</label>
                  <div class="form-group row ml-2">
                    <div class="form-check mr-2">
                      <input class="form-check-input" type="radio" name="hasFast" checked="" id="no_fast" onchange="disable('fast')"  value="off" />
                      <label class="form-check-label" for="no_fast">{{__('No')}}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hasFast" id="yes_fast" onchange="disable('fast')" value="on" 
                       @if(isset($dataset->certificate_oae))
                            checked
                        @endif 
                      />
                      <label class="form-check-label" for="yes_fast">{{__('Si')}}</label>
                    </div>                
                  </div>
                  <input class="form-control" type="text" id="fast" name="fast" value="{{ old('fast', $dataset->fast ?? '') }}" 
                    @if(!isset($dataset->certificate_oae))
                      disabled
                    @endif
                   />
                  @error('fast')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <h4 class="mb-4 mt-2">
              <b>{{ __('Otros servcios') }}</b>
            </h4>

            <!--warehouse -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="warehouse">{{ __('Almacen') }}</label>
                  <input class="form-control" type="text" id="warehouse" name="warehouse" value="{{ old('warehouse',$dataset->warehouse ?? '') }}"/>
                  @error('warehouse')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--fiscal_warehouse -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fiscal_warehouse">{{ __('Almacen fiscal') }}</label>
                  <input class="form-control" type="text" id="fiscal_warehouse" name="fiscal_warehouse" value="{{ old('fiscal_warehouse', $dataset->fiscal_warehouse ?? '') }}"/>
                  @error('fiscal_warehouse')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--position -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="position">{{ __('Puesto') }}</label>
                  <input class="form-control" type="text" id="position" name="position" value="{{ old('position', $dataset->position ?? '') }}"/>
                  @error('position')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Save') }}</button>
                </div>
              </div>
            </div>
          </form>
          <!-- end form -->
        </div>
      </div>
    </div>
  </div>
  <!-- /row-->

  <!-- row-->
  <div class="row">
    <div class="col-md-9">
      <!--card-->
      <div class="card">
        <div class="card-header"  style="background-color:#343a40; color: white">
           <h2 class="card-title">{{ __('Certificado de seguro') }}</h2>
        </div>
        <div class="card-body">
          <!--form-->
          <form action="{{ route('profile.insuranceStore')}}" method="POST">
            @csrf

            <!--name_insurance -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="name_insurance">{{ __('Nombre de agencia') }}</label>
                  <input class="form-control" type="text" id="name_insurance" name="name_insurance" value="{{ old('name_insurance', $insurance->name_insurance ?? '') }}"/>
                  @error('name_insurance')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--contact_name -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="contact_name">{{ __('Nombre contacto') }}</label>
                  <input class="form-control" type="text" id="contact_name" name="contact_name" value="{{ old('contact_name', $insurance->contact_name ?? '') }}"/>
                  @error('contact_name')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--contact_phone -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="contact_phone">{{ __('Telefono contacto') }}</label>
                  <input class="form-control" type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $insurance->contact_phone ?? '') }}"/>
                  @error('contact_phone')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--contact_email -->
            <div class="row">   
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="contact_email">{{ __('Correo contacto') }}</label>
                  <input class="form-control" type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $insurance->contact_email ?? '') }}"/>
                  @error('contact_email')
                    <small class="mt-0" style="color:red">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--button save -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Save') }}</button>
                </div>
              </div>
            </div>

          </form>
          <!--/form-->
        </div>        
      </div>
      <!--/card-->
    </div>
  </div>
  <!--/row-->
</div>
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
@endsection
