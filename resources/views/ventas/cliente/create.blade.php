@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
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
		'url'=>'ventas/cliente',
		'method'=>'POST',
		'autocomplete'=>'off'
	)) !!}

	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input
					require
					type="text"
					name="nombre"
					class="form-control"
					value="{{old('nombre')}}"
					placeholder="Nombre...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="apellidos">Apellidos</label>
				<input
					require
					type="text"
					name="apellidos"
					class="form-control"
					value="{{old('apellidos')}}"
					placeholder="Apellidos...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="email">Email</label>
				<input
					require
					type="email"
					name="email"
					class="form-control"
					value="{{old('email')}}"
					placeholder="Email...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="username">Username</label>
				<input
					require
					type="text"
					name="username"
					class="form-control"
					value="{{old('username')}}"
					placeholder="Username...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="pass">Password</label>
				<input
					require
					type="password"
					name="pass"
					class="form-control"
					value="{{old('pass')}}"
					placeholder="Password...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="edad">Edad</label>
				<input
					require
					type="number"
					name="edad"
					class="form-control"
					value="{{old('edad')}}"
					placeholder="Edad...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tarjeta">Tarjeta</label>
				<input
					require
					type="text"
					name="tarjeta"
					class="form-control"
					value="{{old('tarjeta')}}"
					placeholder="Tarjeta...">
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
