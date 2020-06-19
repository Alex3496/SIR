<div class="row">
  <div class="form-group col-md-6">
    {!! Form::label('country','País') !!}
    {!! Form::select('country',$countries, $location->country_code ?? '',['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('country')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row">
  <div class="form-group col-md-6">
    {!! Form::label('state','Estado') !!}
    {!! Form::select('state',$states ?? [],$location->state_code ?? '',['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('state')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row">
  <div class="form-group col-md-6">
    {!! Form::label('city','Ciudad') !!}
    {!! Form::text('city',$location->city ?? '',['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('city')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row mt-2 mb-2">
  <div class="form-group col-md-6 d-flex justify-content-center">
    <div class="form-check form-check-inline">
      {!! Form::radio('status','ACCEPTED',true,['class' =>'form-check-input','id' =>'status-0']) !!}
      {!! Form::label('status-0','Aceptado',['class' => 'form-check-label' ])!!}
    </div>
    <div class="form-check form-check-inline">
      {!! Form::radio('status','PENDING',false,['class' =>'form-check-input','id' =>'status-1']) !!}
      {!! Form::label('status-1','Pendiente',['class' =>'form-check-label' ])!!}
    </div>
    <div class="form-check form-check-inline">
      {!! Form::radio('status','REJECTED',false,['class' =>'form-check-input','id' =>'status-2']) !!}
      {!! Form::label('status-2','Rechazado',['class' => 'form-check-label' ])!!}
    </div>
    @error('status')
      <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col">
    <a class="btn btn-danger btn-block" href="{{ route('admin.locations.index') }}">{{ __('Cancelar') }}</a>
  </div>
  <div class="col">
    {!! Form::submit('Aceptar',['class' =>'btn btn-success btn-block']) !!}
  </div>
</div>
