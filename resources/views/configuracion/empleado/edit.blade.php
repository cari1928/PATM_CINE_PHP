@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Empelado: {{$persona->nombre}} {{$persona->apellidos}}</h3>
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

	<!-- PATCH llama a la función update de EmpeladosController -->
	{!! Form::model(
		$persona, [
			'method'=>'PATCH',
			'route'=>[
				'empleado.update',
				$persona->persona_id
			]
		]
	) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input
					type="text"
					name="nombre"
					class="form-control"
					value="{{$persona->nombre}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="apellidos">Apellidos</label>
				<input
					type="text"
					name="apellidos"
					class="form-control"
					value="{{$persona->apellidos}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="email">Email</label>
				<input
					type="email"
					name="email"
					class="form-control"
					value="{{$persona->email}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="username">Username</label>
				<input
					type="text"
					name="username"
					class="form-control"
					value="{{$persona->username}}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="pass">Password</label>
				<input
					type="password"
					name="pass"
					class="form-control"
					value="{{$persona->pass}}">
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
