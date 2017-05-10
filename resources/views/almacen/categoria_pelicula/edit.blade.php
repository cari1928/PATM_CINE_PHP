@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoría - Película: {{$categoria_pelicula->categoria_pelicula_id}}</h3>
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

	<!-- PATCH llama a la función update de Categoría - PelículaController -->
	{!! Form::model(
		$categoria_pelicula, [
			'method'=>'PATCH',
			'route'=>[
				'categoria_pelicula.update',
				$categoria_pelicula->categoria_pelicula_id
			]
		]
	) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Categoría</label>
				<!-- name debe coincidir con los campos en request -->
				<select name="categoria_id" class="form-control">
					@foreach($categorias as $cat)
						<option value="{{$cat->categoria_id}}" @if($cat->categoria_id == $categoria_pelicula->categoria_id) selected @endif>
							{{$cat->categoria}}
						</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Película</label>
				<!-- name debe coincidir con los campos en request -->
				<select name="pelicula_id" class="form-control">
					@foreach($peliculas as $pel)
						<option value="{{$pel->pelicula_id}}" @if($pel->pelicula_id == $categoria_pelicula->pelicula_id) selected @endif>
							{{$pel->titulo}}
						</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{{Form::close()}} <!-- no poner !! -->

@endSection
