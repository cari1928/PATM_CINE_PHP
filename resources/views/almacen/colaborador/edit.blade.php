@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Colaborador: {{$colaborador->nombre}} {{$colaborador->apellidos}}</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif

			<!-- PATCH llama a la función update de ColaboradorController -->
			{!! Form::model(
				$colaborador, [
					'method'=>'PATCH',
					'route'=>[
						'colaborador.update',
						$colaborador->colaborador_id
					]
				]
			) !!}

			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input
					type="text"
					name="nombre"
					class="form-control"
					value="{{$colaborador->nombre}}"
					placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos</label>
				<input
					type="text"
					name="apellidos"
					class="form-control"
					value="{{$colaborador->apellidos}}"
					placeholder="Apellidos...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			<!-- no poner !! -->
			{{Form::close()}}
		</div>
	</div>
@endSection
