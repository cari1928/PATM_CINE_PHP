@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Reparto</h3>
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
				'url'=>'almacen/reparto',
				'method'=>'POST',
				'autocomplete'=>'off'
			)) !!}

			{{Form::token()}}
			<div class="form-group">
				<label>Colaborador</label>
				<!-- name debe coincidir con los campos en request -->
				<select name="colaborador_id" class="form-control">
					@foreach($colaboradores as $col)
						<option value="{{$col->colaborador_id}}">
							{{$col->nombre}} {{$col->apellidos}}
						</option>
					@endforeach
				</select>
			</div>
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
			<div class="form-group">
				<label for="puesto">Puesto</label>
				<input
					type="text"
					name="puesto"
					class="form-control"
					value="{{old('puesto')}}"
					placeholder="Puesto...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{{Form::close()}}
		</div>
	</div>
@endSection
