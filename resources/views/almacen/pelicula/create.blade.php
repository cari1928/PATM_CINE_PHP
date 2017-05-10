@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Película</h3>
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

	{!! Form::open(array(
		'url'=>'almacen/pelicula',
		'method'=>'POST',
		'autocomplete'=>'off',
		'files'=>'true'
	)) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="titulo">Título</label>
				<input
					require
					type="text"
					name="titulo"
					class="form-control"
					value="{{old('titulo')}}"
					placeholder="Título...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input
					require
					type="text"
					name="descripcion"
					class="form-control"
					value="{{old('descripcion')}}"
					placeholder="Descripción...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="f_lanzamiento">Lanzamiento</label>
				<input
					require
					type="date"
					name="f_lanzamiento"
					class="form-control"
					value="{{old('f_lanzamiento')}}"
					placeholder="Lanzamiento...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="lenguaje">Lenguaje</label>
				<input
					require
					type="text"
					name="lenguaje"
					class="form-control"
					value="{{old('lenguaje')}}"
					placeholder="Lenguaje...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="duracion">Duración</label>
				<input
					require
					type="number"
					name="duracion"
					class="form-control"
					value="{{old('duracion')}}"
					placeholder="Duración...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="poster">Póster</label>
				<input
					require
					type="file"
					name="poster"
					class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{{Form::close()}}

@endSection
