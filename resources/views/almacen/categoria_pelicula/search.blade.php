<!-- Como este archivo se va a incluir, se agrega un formulario -->
{!! Form::open(array(
	'url'=>'almacen/categoria_pelicula',
	'method'=>'GET',
	'autocomplete'=>'off',
	'role'=>'search'
)) !!}

<div class="form-group">
	<div class="input-group">
		<input
			class="form-control"
			name="searchText"
			placeholder="Buscar..."
			value="{{$searchText}}" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

<!-- se cierra el formulario -->
{{Form::close()}}
