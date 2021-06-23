<div class="row">
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
  <div class="form-group col-md-4">
    {!! Form::label('check_in','Check-In') !!}
    {!! Form::date('check_in', $stay->check_in ?? \Carbon\Carbon::now(),['class' =>'form-control']) !!}
    @error('check_in')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-2">
    {!! Form::label('check_in_hours','Hora') !!}
    <div class="input-group date" id="timepicker" data-target-input="nearest">
      <input name="check_in_hours" type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" value="{{$stay->check_in_hours ?? old('check_in_hours') ?? 12  }}"/>
      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="far fa-clock"></i></div>
      </div>
    </div>
    @error('check_in_hours')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group col-md-4">
    {!! Form::label('check_out','Check-Out') !!}
    {!! Form::date('check_out', $stay->check_out ?? \Carbon\Carbon::now(),['class' =>'form-control']) !!}
    @error('check_out')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-2">
    {!! Form::label('check_out_hours','Hora') !!}
    <div class="input-group date" id="timepicker2" data-target-input="nearest">
      <input name="check_out_hours" type="text" class="form-control datetimepicker-input" data-target="#timepicker2" data-toggle="datetimepicker" value="{{$stay->check_out_hours ?? old('check_out_hours') ?? 13 }}"/>
      <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="far fa-clock"></i></div>
      </div>
    </div>
    @error('check_out_hours')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  
</div>

<div class="row">
  <div class="form-group col-md-4">
    {!! Form::label('type','Tipo') !!}
    {!! Form::select('type',['load' => 'Carga', 'download' => 'Descarga'],$stay->type ?? '',['class' =>'form-control']) !!}
    @error('type')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('free_hours','Horas Libres') !!}
    {!! Form::number('free_hours',$stay->free_hours ?? 0,['class' =>'form-control', 'min' => '0']) !!}
    @error('free_hours')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('cost','Costo') !!}
    <div class="input-group-sm select-input-container">
      {!! Form::number('cost',$stay->cost ?? 0,['class' =>'form-control','min' => '0']) !!}
      {!! Form::select('cost_type',['dia' => 'Dia', 'hora' => 'Hora'],$stay-> cost_type ?? '',['class' => 'form-control select-in']) !!}
      {!! Form::select('cost_currency',['mxn' => 'MXN', 'usd' => 'USD'],$stay-> cost_currency ?? '',['class' => 'form-control select-in']) !!}
    </div>
    @error('cost')
      <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
    @error('cost_type')
      <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
    @error('cost_currency')
      <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row">
  <div class="form-group col-md-4">
    {!! Form::label('unity','Unidad') !!}
    {!! Form::text('unity',$stay->unity ?? 'n/a' ,['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('unity')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('operator','Operador') !!}
    {!! Form::text('operator',$stay->operator ?? 'n/a',['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('operator')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('client','Cliente') !!}
    {!! Form::text('client',$stay->client ?? 'n/a',['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('client')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row">
  <dic class="col-md-6">
    <p>Seleccione el tipo de movimiento:</p>
  </dic>
  <div class="col-12 col-radio">
    @if(isset($stay))
            <label for="payment_operator">
        <input type="radio" id="payment_operator" name="pays" value="payment_operator" onclick="hidepays('payment_operator')" checked
          {{ (old('pays') == 'payment_operator') || $stay->pays == 'payment_operator' ? 'checked' : '' }}
        >
        Pago a Operador
      </label>
      <label for="customer_charge">
        <input type="radio" id="customer_charge" name="pays" value="customer_charge" onclick="hidepays('customer_charge')"
          {{ (old('pays') == 'customer_charge') || $stay->pays == 'customer_charge'  ? 'checked' : '' }}
        >
        Cobro a cliente
      </label>
      <label for="both">
        <input type="radio" id="both" name="pays" value="both" onclick="hidepays('both')"
          {{ (old('pays') == 'both') || $stay->pays == 'both'  ? 'checked' : '' }}
        >
        Ambas
      </label>
        @else
          <label for="payment_operator">
            <input type="radio" id="payment_operator" name="pays" value="payment_operator" onclick="hidepays('payment_operator')" checked
              {{ (old('pays') == 'payment_operator') ? 'checked' : '' }}
            >
            Pago a Operador
          </label>
          <label for="customer_charge">
            <input type="radio" id="customer_charge" name="pays" value="customer_charge" onclick="hidepays('customer_charge')"
              {{ (old('pays') == 'customer_charge') ? 'checked' : '' }}
            >
            Cobro a cliente
          </label>
          <label for="both">
            <input type="radio" id="both" name="pays" value="both" onclick="hidepays('both')"
              {{ (old('pays') == 'both')? 'checked' : '' }}
            >
            Ambas
          </label>
        @endif
  </div>
</div>
<div class="row" >
    <!-- Pago a operador -->
    <div class="form-group col-md-6" id="col-paid" style="display: none;">
      {!! Form::label('payment_operator', 'Pago a Operador') !!}
      <div class="input-group-sm">
        {!! Form::number('payment_operator',$stay->payment_operator ?? 0,['class' =>'form-control','min' => '0']) !!}
      </div>
      @error('payment_operator')
        <small class="mt-0" style="color:red">{{ $message }}</small>
      @enderror
    </div>

    <!-- Cobro a cliente-->
    <div class="form-group col-md-6" id="col-charge" style="display: none;">
      {!! Form::label('customer_charge', 'Cobro a Cliente') !!}
      <div class="input-group-sm">
        {!!  Form::number('customer_charge', $stay->customer_charge ?? 0, ['class' => 'form-control','min' => '0']); !!}
      </div>
      @error('customer_charge')
        <small class="mt-0" style="color:red">{{ $message }}</small>
      @enderror
    </div>
</div>
<div class="row">
  <div class="form-group col-md-7">
    {!! Form::label('direction','Dirección') !!}
    {!! Form::text('direction',$stay->direction ?? 'n/a',['class' =>'form-control','autocomplete' =>'off']) !!}
    @error('direction')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col">
    <a class="btn btn-danger btn-block" href="{{ route('stays.index') }}">{{ __('Cancelar') }}</a>
  </div>
  <div class="col">
    {!! Form::submit('Aceptar',['class' =>'btn btn-success btn-block']) !!}
  </div>
</div>
