@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Película: {{$pelicula->title}}</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	<!-- PATCH llama a la función update de PelículaController -->
	{!! Form::model(
		$pelicula, [
			'method'=>'PATCH',
			'route'=>[
				'pelicula.update',
				$pelicula->pelicula_id
			],
			'files'=>'true'
		]
	) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="titulo">Título</label>
				<input
					type="text"
					name="titulo"
					class="form-control"
					value="{{$pelicula->titulo}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input
					type="text"
					name="descripcion"
					class="form-control"
					value="{{$pelicula->descripcion}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="f_lanzamiento">Lanzamiento</label>
				<input
					type="date"
					name="f_lanzamiento"
					class="form-control"
					value="{{$pelicula->f_lanzamiento}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="lenguaje">Lenguaje</label>
				<input
					type="text"
					name="lenguaje"
					class="form-control"
					value="{{$pelicula->lenguaje}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="duracion">Duración</label>
				<input
					type="number"
					name="duracion"
					class="form-control"
					value="{{$pelicula->duracion}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="poster">Póster</label>
				<input
					type="file"
					name="poster"
					class="form-control">
				<!-- si ya hay una ruta cargada en la imagen -->
				@if(($pelicula->poster) != "")
					<img
						src="{{asset('imagenes/posters/'.$pelicula->poster)}}"
						height="300px"
						width="300px">
				@endif
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{{Form::close()}} <!-- no poner !! -->

@endSection
