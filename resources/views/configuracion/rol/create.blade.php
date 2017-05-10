@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Rol</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif

			{!! Form::open(array(
				'url'=>'configuracion/rol',
				'method'=>'POST',
				'autocomplete'=>'off'
			)) !!}

			{{Form::token()}}
			<div class="form-group">
				<label for="rol">Rol</label>
				<input
					type="text"
					name="rol"
					class="form-control"
					placeholder="Rol...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{{Form::close()}}
		</div>
	</div>
@endSection
