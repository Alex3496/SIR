<div class="card card-warning ">
  <div class="card-header" data-card-widget="collapse">
    <h2 class="card-title">{{ __('Certificado de seguro') }}</h2>
    <div class="card-tools">
      <button type="button" class="btn btn-tool"  data-card-widget="collapse">
        <i class="fas fa-plus"> </i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <!--form-->

    {!! Form::open(['route' => ['admin.updateInsurance',$userToEdit], 'method' => 'PUT']) !!}

    	<div class="row">
    		<div class=" form-group col-md-6">
    			{!! Form::label('name_insurance','Nombre de la agencia') !!}
    			{!! Form::text('name_insurance', $insurance->name_insurance ?? '', ['class' => 'form-control']) !!}
    			@error('name_insurance')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
    		</div>
    	</div>

    	<div class="row">
    		<div class=" form-group col-md-6">
    			{!! Form::label('contact_name','Nombre de contacto') !!}
    			{!! Form::text('contact_name', $insurance->contact_name ?? '', ['class' => 'form-control']) !!}
    			@error('contact_name')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
    		</div>
    	</div>

    	<h4 class="mb-4 mt-2">
        <b>{{ __('Cobertura') }}</b>
      </h4>

    	<div class="form-check mb-2 ml-2">
    		{!! Form::checkbox('general_liability_ins', '1', $insurance->general_liability_ins ?? false ,['class' => 'form-check-input']) !!}
    		<b>
    			{!! Form::label('general_liability_ins','General Liability Insurance',['class' => 'form-check-label ml-2']) !!}
    		</b>
    	</div>

    	<div class="form-check mb-2 ml-2">
    		{!! Form::checkbox('commercial_general_liability', '1', $insurance->commercial_general_liability ?? false,['class' => 'form-check-input']) !!}
    		<b>
    			{!! Form::label('commercial_general_liability','Commercial General Liability',['class' => 'form-check-label ml-2']) !!}
    		</b>
    	</div>

    	<div class="form-check mb-2 ml-2">
    		{!! Form::checkbox('auto_liability', '1', $insurance->auto_liability ?? false,['class' => 'form-check-input']) !!}
    		<b>
    			{!! Form::label('auto_liability','Automobile Liability',['class' => 'form-check-label ml-2']) !!}
    		</b>
    	</div>

    	<div class="form-check mb-2 ml-2">
    		{!! Form::checkbox('motor_truck_cargo', '1', $insurance->motor_truck_cargo ?? false,['class' => 'form-check-input']) !!}
    		<b>
    			{!! Form::label('motor_truck_cargo','Motor Truck Cargo',['class' => 'form-check-label ml-2']) !!}
    		</b>
    	</div>

    	<div class="form-check mb-2 ml-2">
    		{!! Form::checkbox('trailer_interchange', '1', $insurance->trailer_interchange ?? false,['class' => 'form-check-input']) !!}
    		<b>
    			{!! Form::label('trailer_interchange','Trailer Interchange',['class' => 'form-check-label ml-2']) !!}
    		</b>
    	</div>

      <div class="row mt-5">
        <div class=" form-group col-md-6">
          {!! Form::label('another_insurance','Otra certificación') !!}
          {!! Form::text('another_insurance', $insurance->another_insurance ?? '', ['class' => 'form-control']) !!}
          @error('another_insurance')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>

    	<div class="row">
        <div class="col">
          <div class="form-group mt-4">
            {!! Form::submit('Guardar',['class' =>'btn btn-primary btn-block']) !!}
          </div>
        </div>
      </div>

    {!! Form::close() !!}
  </div>
</div>
