@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Categoría - Película</h3>
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
		'url'=>'almacen/categoria_pelicula',
		'method'=>'POST',
		'autocomplete'=>'off'
	)) !!}
	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Categoría</label>
				<!-- name debe coincidir con los campos en request -->
				<select name="categoria_id" class="form-control">
					@foreach($categorias as $cat)
						<option value="{{$cat->categoria_id}}">
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
						<option value="{{$pel->pelicula_id}}">
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

	{{Form::close()}}

@endSection
