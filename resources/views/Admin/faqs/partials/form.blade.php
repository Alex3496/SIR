
<div class="form-group">
  <label for="name">{{ __('Pregunta') }}</label>
  {!! Form::text('question',$faq->question ?? '¿?',['class' => 'form-control','autocomplete' => 'off']) !!}
  @error('question')
  <small class="mt-0" style="color:red">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="name">{{ __('Respuesta') }}</label>
  {!! Form::textarea('answer',$faq->answer ?? '',['class' => 'form-control','autocomplete' => 'off']) !!}
  @error('answer')
  <small class="mt-0" style="color:red">{{ $message }}</small>
  @enderror
</div>
<div class="d-flex justify-content-center">
	<div class="col-md-6">
  	{!! Form::submit('Aceptar',['class' =>'btn btn-primary btn-block']) !!}
	</div>
</div>
