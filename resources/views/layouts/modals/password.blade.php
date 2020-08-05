<div 
	class="modal fade" 
	id="EditPassword" 
	tabindex="-1" 
	role="dialog" 
	aria-labelledby="exampleModalLabel" 
	aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 30em;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Editar Contraseña')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if($user->hasRole('user'))
      	{!! Form::open(['route' => 'password.change', 'method' => 'PUT','autocomplete' => 'off']) !!}
      @else
      	{!! Form::open(['route' => 'admin.password.change', 'method' => 'PUT']) !!}
      @endif
	      <div class="modal-body mt-3">
	      	<div class="row m-0">
	      		<div class="col">
			      	<div class="form-group">
			        	{!! Form::label('password', 'Contraseña actual'); !!}
		    				
		    				{!! Form::password('password', ['class' => 'form-control','autocomplete' => 'new-password']); !!}
		  				</div>
	      		</div>
	      	</div>

	      	<div class="row m-0">
	      		<div class="col">
			      	<div class="form-group">
			        	{!! Form::label('new_password', 'Contraseña nueva'); !!}
		    				
		    				{!! Form::password('new_password', ['class' => 'form-control']); !!}
		  				</div>
	      		</div>
	      	</div>

	      	<div class="row m-0">
	      		<div class="col">
			      	<div class="form-group">
			        	{!! Form::label('new_password_confirmation', 'Confirmar contraseña'); !!}
		    				
		    				{!! Form::password('new_password_confirmation', ['class' => 'form-control']); !!}
		  				</div>
	      		</div>
	      	</div>

	      </div>
	      <div class="modal-footer row m-0">
	        <button type="button" class="btn btn-secondary col" data-dismiss="modal">{{__('Cancelar')}}</button>
	        {!! Form::submit('Guardar',['class' => 'btn btn-primary col']); !!}
	      </div>
	    {!! Form::close() !!}
    </div>
  </div>
</div>