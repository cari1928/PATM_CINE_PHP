@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Películas <a href="pelicula/create">
			<button class="btn btn-success">Nuevo</button>
		</a></h3>
		@include('almacen.pelicula.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>TÍTULO</th>
					<th>DESCRIPCIÓN</th>
					<th>LANZAMIENTO</th>
					<th>LENGUAJE</th>
					<th>DURACIÓN</th>
					<th>PÓSTER</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($peliculas as $pel)
				<tr>
					<td>{{$pel->pelicula_id}}</td>
					<td>{{$pel->titulo}}</td>
					<td>{{$pel->descripcion}}</td>
					<td>{{$pel->f_lanzamiento}}</td>
					<td>{{$pel->lenguaje}}</td>
					<td>{{$pel->duracion}}</td>
					<td>
						<!-- asset = usar carpeta public -->
						<img
							src="{{asset('imagenes/posters/'.$pel->poster)}}"
							alt="{{$pel->titulo}}"
							height="100px"
							width="100px"
							class="img-thumbnail">
					</td>
					<td>
						<a
							href="{{URL::action('PeliculaController@edit',$pel->pelicula_id)}}">
							<button class="btn btn-info form-control">
								Editar
							</button>
						</a>
                         <a
                         	href=""
                         	data-target="#modal-delete-{{$pel->pelicula_id}}" data-toggle="modal">
                         	<button class="btn btn-danger form-control">
                         		Eliminar
                     		</button>
                     	</a>
					</td>
				</tr>
				@include('almacen.pelicula.modal')
				@endforeach
			</table>
		</div>
		{{$peliculas->render()}}
	</div>
</div>

@endsection
