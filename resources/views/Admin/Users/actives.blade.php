@extends('layouts.dashboardAdmin.dashboard')

@section('content')
<section>
	<h2>Activos del Usuario: {{$userToEdit->name}}</h2>
	<div>
		<div class="row">
			<div class="col-md-6 tab-header-col center">
				<ul class="tabs">
					<li data-tab-target="#Equipos" class=" tab bttn btn-blue active">Equipos</li>
					<li data-tab-target="#Operadores" class="tab bttn btn-blue ">Operadores</li>
					<li data-tab-target="#Vehiculos" class="tab bttn btn-blue ">Vehículos</li>
				</ul>
			</div>
		</div>
		<div class="tab-content">
			<div id="Equipos" data-tab-content class="active">
				 <!--start card User List-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">{{ __('Equipos Regsitrados') }}: {{$equipments->total()}}</h3>
				  </div>
				  <div class="card-body table-responsive">
					<table id="example2" class="table table-bordered table-hover">
					  <thead>
						<tr>
						  <th>{{__('Tipo de Equipo')}}</th>
						  <th>{{__('Economico')}}</th>
						  <th>{{__('Placas US')}}</th>
						  <th>{{__('Estado US')}}</th>
						  <th>{{__('Placas MX')}}</th>
						  <th>{{__('Estado MX')}}</th>
						  <th>{{__('VIN')}}</th>
						  <th>{{__('Acciones')}}</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($equipments as $equipment)
						<tr>
						  <td>{{ $equipment->get_type_equipment }}</td>
						  <td>{{ $equipment->economic }}</td>
						  <td>{{ $equipment->plates_us }}</td>
						  <td>{{ $equipment->get_state_us }}</td>
						  <td>{{ $equipment->plates_mx }}</td>
						  <td>{{ $equipment->get_state_mx }}</td>
						  <td>{{ $equipment->vin }}</td>
						  <td>
						  </td>
						</tr>
						@endforeach
					  </tbody>
					</table>
				  </div>
				  <div class="row">
					<div class="col-12 center">
					  {{ $equipments->links() }}
					</div>
				  </div>
				</div>
				<!--/end card-->
			</div>
			<div id="Operadores" data-tab-content>
				 <!--start card User List-->
		        <div class="card">
		          <div class="card-header">
		            <h3 class="card-title">{{ __('Operadores Regsitrados') }}: {{$operators->total()}}</h3>
		          </div>
		          <div class="card-body table-responsive">
		            <table id="example2" class="table table-bordered table-hover">
		              <thead>
		                <tr>
		                  <th>{{__('Nombre')}}</th>
		                  <th>{{__('Licencia')}}</th>
		                  <th>{{__('Visa')}}</th>
		                  <th>{{__('Fast')}}</th>
		                  <th>{{__('Gafete Único')}}</th>
		                  <th>{{__('R-Control')}}</th>
		                  <th>{{__('Acciones')}}</th>
		                </tr>
		              </thead>
		              <tbody>
		                @foreach($operators as $operator)
		                <tr>
		                  <td>{{ $operator->name }} {{ $operator->last_name }}</td>
		                  <td>{{ $operator->license }}</td>
		                  <td>{{ $operator->visa }}</td>
		                  <td>{{ $operator->fast }}</td>
		                  <td>{{ $operator->unique_badge }}</td>
		                  <td>{{ $operator->r_control }}</td>
		                  <td>
		                
		                  </td>
		                </tr>
		                @endforeach
		              </tbody>
		            </table>
		          </div>
		          <div class="row">
		            <div class="col-12 center">
		              {{ $operators->links() }}
		            </div>
		          </div>
		        </div>
		        <!--/end card-->
			</div>
			<div id="Vehiculos" data-tab-content>
				<!--start card User List-->
		        <div class="card">
		          <div class="card-header">
		            <h3 class="card-title">{{ __('Vehículos Regsitradas') }}: {{$vehicles->total()}}</h3>
		          </div>
		          <div class="card-body table-responsive">
		            <table id="example2" class="table table-bordered table-hover">
		              <thead>
		                <tr>
		                  <th>{{__('Economico')}}</th>
		                  <th>{{__('Placas US')}}</th>
		                  <th>{{__('Estado US')}}</th>
		                  <th>{{__('Placas MX')}}</th>
		                  <th>{{__('Estado MX')}}</th>
		                  <th>{{__('VIN')}}</th>
		                  <th>{{__('Acciones')}}</th>
		                </tr>
		              </thead>
		              <tbody>
		                @foreach($vehicles as $vehicle)
		                <tr>
		                  <td>{{ $vehicle->economic }}</td>
		                  <td>{{ $vehicle->plates_us }}</td>
		                  <td>{{ $vehicle->get_state_us }}</td>
		                  <td>{{ $vehicle->plates_mx }}</td>
		                  <td>{{ $vehicle->get_state_mx }}</td>
		                  <td>{{ $vehicle->vin }}</td>
		                  <td>
		                  </td>
		                </tr>
		                @endforeach
		              </tbody>
		            </table>
		          </div>
		          <div class="row">
		            <div class="col-12 center">
		              {{ $vehicles->links() }}
		            </div>
		          </div>
		        </div>
		        <!--/end card-->
			</div>
		</div>
	</div>
</section>
@endsection


@section('extraScript')

<script type="text/javascript">
	/*codigo JS para el manejo de tabs*/
	const tabs = document.querySelectorAll('[data-tab-target]')
	const tabContents = document.querySelectorAll('[data-tab-content]')
	tabs.forEach(tab => {
		tab.addEventListener('click', () => {
			const target = document.querySelector(tab.dataset.tabTarget)
			//quita la clase active de todas
			tabContents.forEach(tabContent => {tabContent.classList.remove('active')})
			tabs.forEach(tab => {tab.classList.remove('active')})
			//agregar clase active al div a mostrar
			target.classList.add('active')
			tab.classList.add('active')
		})
	})
</script>
<!-- DataTables -->
<script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminLTE/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});
	$(".example2").DataTable({
	  "paging": true,
	  "lengthChange": false,
	  "searching": false,
	  "ordering": true,
	  "info": true,
	  "autoWidth": false,
	  "responsive": true,
	});

  }); 
</script>
@endsection
