@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva relación Empleado - Sucursal</h3>
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
		'url'=>'configuracion/personal',
		'method'=>'POST',
		'autocomplete'=>'off'
	)) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Empleado</label>
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
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<input
					require
					type="text"
					name="ciudad"
					class="form-control"
					value="{{old('ciudad')}}"
					placeholder="Ciudad...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input
					require
					type="text"
					name="direccion"
					class="form-control"
					value="{{old('direccion')}}"
					placeholder="Dirección...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="latitud">Latitutd</label>
				<input
					require
					type="text"
					name="latitud"
					class="form-control"
					value="{{old('latitud')}}"
					placeholder="Latitutd...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="longitud">Longitud</label>
				<input
					require
					type="text"
					name="longitud"
					class="form-control"
					value="{{old('longitud')}}"
					placeholder="Longitud...">
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
