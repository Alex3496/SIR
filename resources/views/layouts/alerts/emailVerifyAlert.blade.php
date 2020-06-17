@if (session('resent'))
	<div class="alert alert-success" role="alert">{{ __('Un nuevo enlace de verificación ha sido enviado a tu correo.') }}</div>
@endif

@if($user->email_verified_at == null)
<div class="alert alert-warning alert-dismissible fade show" role="alert">

	{{__('Antes de proceder, por favor busca en tu correo el enlace de  verificación, puede tardar unos minutos')}}
	{{ __('Si no haz recibido el correo') }},
	<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
	  @csrf
	  <button type="submit" class="btn btn-link p-0 m-0 align-baseline alert-link">{{ __(' haz click para pedir otro enlace') }}</button>.
	</form>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
