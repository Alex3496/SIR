<div 
	class="modal fade" 
	id="EditEmail" 
	tabindex="-1" 
	role="dialog" 
	aria-labelledby="exampleModalLabel" 
	aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 30em;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Editar Correo')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if($user->hasRole('user'))
      	{!! Form::open(['route' => 'profile.update', 'method' => 'PUT']) !!}
      @else
      	{!! Form::open(['route' => 'admin.profile.update', 'method' => 'PUT']) !!}
      @endif
	      <div class="modal-body mt-5">
	      	<div class="row m-0">
	      		<div class="col">
			      	<div class="form-group">
			        	{!! Form::label('email', 'Correo'); !!}
		    				
		    			{!! Form::email('email', $user->email, ['class' => 'form-control']); !!}
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