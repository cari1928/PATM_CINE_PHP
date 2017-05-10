@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Reparto <a href="reparto/create">
			<button class="btn btn-success">Nuevo</button>
		</a></h3>
		@include('almacen.reparto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>COLABORADOR</th>
					<th>PELÍCULA</th>
					<th>PUESTO</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($repartos as $rep)
				<tr>
					<td>{{$rep->reparto_id}}</td>
					<td>{{$rep->colaborador}}</td>
					<td>{{$rep->pelicula}}</td>
					<td>{{$rep->puesto}}</td>
					<td>
						<a
							href="{{URL::action('RepartoController@edit',$rep->reparto_id)}}">
							<button class="btn btn-info">Editar</button>
						</a>
                         <a
                         	href=""
                         	data-target="#modal-delete-{{$rep->reparto_id}}" data-toggle="modal">
                         	<button class="btn btn-danger">Eliminar</button>
                     	</a>
					</td>
				</tr>
				@include('almacen.reparto.modal')
				@endforeach
			</table>
		</div>
		{{$repartos->render()}}
	</div>
</div>

@endsection
