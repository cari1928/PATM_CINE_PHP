@extends('layout.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoría: {{$categoria->categoria}}</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif

			<!-- PATCH llama a la función update de CategoríaController -->
			{!! Form::model(
				$categoria, [
					'method'=>'PATCH',
					'route'=>[
						'categoria.update',
						$categoria->categoria_id
					]
				]
			) !!}

			{{Form::token()}}
			<div class="form-group">
				<label for="categoria">Categoría</label>
				<input
					type="text"
					name="categoria"
					class="form-control"
					value="{{$categoria->categoria}}"
					placeholder="Categoría...">
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
