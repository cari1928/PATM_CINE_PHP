@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>
			Listado de Categoría - Película
			<a href="categoria_pelicula/create">
				<button class="btn btn-success">Nuevo</button>
			</a>
		</h3>
		@include('almacen.categoria_pelicula.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>CATEGORIA</th>
					<th>PELICULA</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($categoria_peliculas as $cat)
				<tr>
					<td>{{$cat->categoria_pelicula_id}}</td>
					<td>{{$cat->categoria}}</td>
					<td>{{$cat->pelicula}}</td>
					<td>
						<a
							href="{{URL::action('CategoriaPeliculaController@edit',$cat->categoria_pelicula_id)}}">
							<button class="btn btn-info">Editar</button>
						</a>
                         <a
                         	href=""
                         	data-target="#modal-delete-{{$cat->categoria_pelicula_id}}" data-toggle="modal">
                         	<button class="btn btn-danger">Eliminar</button>
                     	</a>
					</td>
				</tr>
				@include('almacen.categoria_pelicula.modal')
				@endforeach
			</table>
		</div>
		{{$categoria_peliculas->render()}}
	</div>
</div>

@endsection
