@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Sucursal: {{$sucursal->pais}} {{$sucursal->ciudad}} {{$sucursal->direccion}}</h3>
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

	<!-- PATCH llama a la función update de SucursalsController -->
	{!! Form::model(
		$sucursal, [
			'method'=>'PATCH',
			'route'=>[
				'sucursal.update',
				$sucursal->sucursal_id
			]
		]
	) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="pais">Pais</label>
				<input
					type="text"
					name="pais"
					class="form-control"
					value="{{$sucursal->pais}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<input
					type="text"
					name="ciudad"
					class="form-control"
					value="{{$sucursal->ciudad}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input
					type="text"
					name="direccion"
					class="form-control"
					value="{{$sucursal->direccion}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="latitud">Latitud</label>
				<input
					type="text"
					name="latitud"
					class="form-control"
					value="{{$sucursal->latitud}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="longitud">Longitud</label>
				<input
					type="text"
					name="longitud"
					class="form-control"
					value="{{$sucursal->longitud}}">
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
