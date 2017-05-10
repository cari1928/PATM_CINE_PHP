@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Colaboradores <a href="colaborador/create">
			<button class="btn btn-success">Nuevo</button>
		</a></h3>
		@include('almacen.colaborador.search')
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
					<th>OPCIONES</th>
				</thead>
               @foreach ($colaboradores as $col)
				<tr>
					<td>{{$col->colaborador_id}}</td>
					<td>{{$col->nombre}}</td>
					<td>{{$col->apellidos}}</td>
					<td>
						<a
							href="{{URL::action('ColaboradorController@edit',$col->colaborador_id)}}">
							<button class="btn btn-info">
								Editar
							</button>
						</a>
                         <a
                         	href=""
                         	data-target="#modal-delete-{{$col->colaborador_id}}" data-toggle="modal">
                         	<button class="btn btn-danger">
                         		Eliminar
                     		</button>
                     	</a>
					</td>
				</tr>
				@include('almacen.colaborador.modal')
				@endforeach
			</table>
		</div>
		{{$colaboradores->render()}}
	</div>
</div>

@endsection
