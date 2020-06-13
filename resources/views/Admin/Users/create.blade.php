@extends('layouts.dashboardAdmin.dashboard')
@section('content')
	<div class="container-md">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				@include('Admin.Users.cards.createUser')
			</div>		
		</div>
	</div>
@endsection

@section('extraScript')
<script type="text/javascript">
	function hide() {
		document.getElementById("TypeCompany").style.display = 'none';
	}

	function show() {
		document.getElementById("TypeCompany").style.display = 'flex';
	}
</script>
@endsection
