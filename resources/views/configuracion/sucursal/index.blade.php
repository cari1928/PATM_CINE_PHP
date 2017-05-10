@extends ('layout.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Sucursales <a href="sucursal/create">
			<button class="btn btn-success">Nuevo</button>
		</a></h3>
		@include('configuracion.sucursal.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>PAIS</th>
					<th>CIUDAD</th>
					<th>DIRECCION</th>
					<th>LATITUD</th>
					<th>LONGITUD</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($sucursales as $suc)
				<tr>
					<td>{{$suc->sucursal_id}}</td>
					<td>{{$suc->pais}}</td>
					<td>{{$suc->ciudad}}</td>
					<td>{{$suc->direccion}}</td>
					<td>{{$suc->latitud}}</td>
					<td>{{$suc->longitud}}</td>
					<td>
						<a
							href="{{URL::action('SucursalController@edit',$suc->sucursal_id)}}">
							<button class="btn btn-info form-control">
								Editar
							</button>
						</a>
						<!-- para evitar problemas -->
                         <!-- <a
                         	href=""
                         	data-target="#modal-delete-{{$suc->sucursal_id}}" data-toggle="modal">
                         	<button class="btn btn-danger">Eliminar</button>
                     	</a> -->
					</td>
				</tr>
				@include('configuracion.sucursal.modal')
				@endforeach
			</table>
		</div>
		{{$sucursales->render()}}
	</div>
</div>

@endsection
