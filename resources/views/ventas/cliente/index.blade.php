@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create">
			<button class="btn btn-success">Nuevo</button>
		</a></h3>
		@include('ventas.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>APELLIDOS</th>
					<th>EMAIL</th>
					<th>USERNAME</th>
					<th>EDAD</th>
					<th>TARJETA</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($personas as $per)
				<tr>
					<td>{{$per->persona_id}}</td>
					<td>{{$per->nombre}}</td>
					<td>{{$per->apellidos}}</td>
					<td>{{$per->email}}</td>
					<td>{{$per->username}}</td>
					<td>{{$per->edad}}</td>
					<td>{{$per->tarjeta}}</td>
					<td>
						<a
							href="{{URL::action('ClienteController@edit',$per->persona_id)}}">
							<button class="btn btn-info form-control">
								Editar
							</button>
						</a>
						<!-- para evitar problemas -->
                         <!-- <a
                         	href=""
                         	data-target="#modal-delete-{{$per->persona_id}}" data-toggle="modal">
                         	<button class="btn btn-danger">Eliminar</button>
                     	</a> -->
					</td>
				</tr>
				@include('ventas.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection
