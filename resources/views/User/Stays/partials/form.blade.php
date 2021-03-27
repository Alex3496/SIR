<div class="row">
  <div class="form-group col-md-4">
    {!! Form::label('check_in','Check-In') !!}
    {!! Form::date('check_in', $stay->check_in ?? \Carbon\Carbon::now(),['class' =>'form-control']) !!}
    @error('check_in')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-1">
    {!! Form::label('check_in_hours','Hora') !!}
    {!! Form::select('check_in_hours',[
      '00' =>'00', 
      '01' =>'01',
      '02' =>'02',
      '04' =>'04',
      '05' =>'05',
      '06' =>'06',
      '07' =>'07',
      '08' =>'08',
      '09' =>'09',
      '10' =>'10',
      '11' =>'11',
      '12' =>'12',
      '13' =>'13',
      '14' =>'14',
      '15' =>'15',
      '16' =>'16',
      '17' =>'17',
      '18' =>'18',
      '19' =>'19',
      '20' =>'20',
      '21' =>'21',
      '22' =>'22',
      '23' =>'23'],$stay->check_in_hours ?? '12',['class' =>'form-control']) !!}
    @error('check_in_hours')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-1">
    {!! Form::label('check_in_minutes','Minutos') !!}
    {!! Form::select('check_in_minutes',[
      '00' =>'00', 
      '01' =>'01',
      '02' =>'02',
      '04' =>'04',
      '05' =>'05',
      '06' =>'06',
      '07' =>'07',
      '08' =>'08',
      '09' =>'09',
      '10' =>'10',
      '11' =>'11',
      '12' =>'12',
      '13' =>'13',
      '14' =>'14',
      '15' =>'15',
      '16' =>'16',
      '17' =>'17',
      '18' =>'18',
      '19' =>'19',
      '20' =>'20',
      '21' =>'21',
      '22' =>'22',
      '23' =>'23',
      '24' =>'24',
      '25' =>'25',
      '26' =>'26',
      '27' =>'27',
      '28' =>'28',
      '29' =>'29',
      '30' =>'30',
      '31' =>'31',
      '32' =>'32',
      '33' =>'33',
      '34' =>'34',
      '35' =>'35',
      '36' =>'36',
      '37' =>'37',
      '38' =>'38',
      '39' =>'39',
      '40' =>'40',
      '41' =>'41',
      '42' =>'42',
      '43' =>'43',
      '44' =>'44',
      '45' =>'45',
      '46' =>'46',
      '47' =>'47',
      '48' =>'48',
      '49' =>'49',
      '50' =>'50',
      '51' =>'51',
      '52' =>'52',
      '53' =>'53',
      '54' =>'54',
      '55' =>'55',
      '56' =>'56',
      '57' =>'57',
      '58' =>'58',
      '59' =>'59',
      ],$stay->check_in_minutes ?? '',['class' =>'form-control']) !!}
    @error('check_in_minutes')
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
  <div class="form-group col-md-1">
    {!! Form::label('check_out_hours','Hora') !!}
    {!! Form::select('check_out_hours',[
      '00' =>'00', 
      '01' =>'01',
      '02' =>'02',
      '04' =>'04',
      '05' =>'05',
      '06' =>'06',
      '07' =>'07',
      '08' =>'08',
      '09' =>'09',
      '10' =>'10',
      '11' =>'11',
      '12' =>'12',
      '13' =>'13',
      '14' =>'14',
      '15' =>'15',
      '16' =>'16',
      '17' =>'17',
      '18' =>'18',
      '19' =>'19',
      '20' =>'20',
      '21' =>'21',
      '22' =>'22',
      '23' =>'23'],$stay->check_out_hours ?? '12',['class' =>'form-control']) !!}
    @error('check_out_hours')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-1">
    {!! Form::label('check_out_minutes','Minutos') !!}
    {!! Form::select('check_out_minutes',[
      '00' =>'00', 
      '01' =>'01',
      '02' =>'02',
      '04' =>'04',
      '05' =>'05',
      '06' =>'06',
      '07' =>'07',
      '08' =>'08',
      '09' =>'09',
      '10' =>'10',
      '11' =>'11',
      '12' =>'12',
      '13' =>'13',
      '14' =>'14',
      '15' =>'15',
      '16' =>'16',
      '17' =>'17',
      '18' =>'18',
      '19' =>'19',
      '20' =>'20',
      '21' =>'21',
      '22' =>'22',
      '23' =>'23',
      '24' =>'24',
      '25' =>'25',
      '26' =>'26',
      '27' =>'27',
      '28' =>'28',
      '29' =>'29',
      '30' =>'30',
      '31' =>'31',
      '32' =>'32',
      '33' =>'33',
      '34' =>'34',
      '35' =>'35',
      '36' =>'36',
      '37' =>'37',
      '38' =>'38',
      '39' =>'39',
      '40' =>'40',
      '41' =>'41',
      '42' =>'42',
      '43' =>'43',
      '44' =>'44',
      '45' =>'45',
      '46' =>'46',
      '47' =>'47',
      '48' =>'48',
      '49' =>'49',
      '50' =>'50',
      '51' =>'51',
      '52' =>'52',
      '53' =>'53',
      '54' =>'54',
      '55' =>'55',
      '56' =>'56',
      '57' =>'57',
      '58' =>'58',
      '59' =>'59',
      ],$stay->check_out_minutes ?? '',['class' =>'form-control']) !!}
    @error('check_out_minutes')
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
    {!! Form::number('free_hours',$stay->free_hours ?? 0,['class' =>'form-control']) !!}
    @error('free_hours')
    <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('cost_hour','Coste por Hora') !!}
    {!! Form::number('cost_hour',$stay->cost_hour ?? 0,['class' =>'form-control']) !!}
    @error('cost_hour')
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
    <p>Seleecione el tipo de movimiento:</p>
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
        {!! Form::number('payment_operator',$stay->payment_operator ?? 0,['class' =>'form-control']) !!}
      </div>
      @error('payment_operator')
        <small class="mt-0" style="color:red">{{ $message }}</small>
      @enderror
    </div>

    <!-- Cobro a cliente-->
    <div class="form-group col-md-6" id="col-charge" style="display: none;">
      {!! Form::label('customer_charge', 'Cobro a Cliente') !!}
      <div class="input-group-sm">
        {!!  Form::number('customer_charge', $stay->customer_charge ?? 0, ['class' => 'form-control']); !!}
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
