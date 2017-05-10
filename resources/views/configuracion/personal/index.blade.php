@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Empleado - Sucursal <a href="personal/create">
			<button class="btn btn-success">Nuevo</button>
		</a></h3>
		@include('configuracion.personal.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>EMPLEADO</th>
					<th>SUCURSAL</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($personales as $per)
				<tr>
					<td>{{$per->personal_id}}</td>
					<td>{{$per->nombre}} {{$per->apellidos}}</td>
					<td>{{$per->pais}} - {{$per->ciudad}} - {{$per->direccion}}</td>
					<td>
						<a
							href="{{URL::action('PersonalController@edit',$per->personal_id)}}">
							<button class="btn btn-info">
								Editar
							</button>
						</a>
                         <a
                         	href=""
                         	data-target="#modal-delete-{{$per->personal_id}}" data-toggle="modal">
                         	<button class="btn btn-danger">Eliminar</button>
                     	</a>
					</td>
				</tr>
				@include('configuracion.personal.modal')
				@endforeach
			</table>
		</div>
		{{$personales->render()}}
	</div>
</div>

@endsection
