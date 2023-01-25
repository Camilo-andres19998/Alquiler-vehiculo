@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de vehiculo <a href="vehiculo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('alquiler.vehiculo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Patente</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Venta</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($vehiculos as $ve)
				<tr>
					<td>{{ $ve->idvehiculo}}</td>
					
					<td>{{ $ve->patente}}</td>
					<td>{{ $ve->marca}}</td>
					<td>{{ $ve->modelo}}</td>
					<td>{{ $ve->venta}}</td>
					<td>
						<img src="{{asset('imagenes/vehiculos/'.$art->imagen)}}" alt="{{$art->marca}}" height="100px" width="100px" class="img-thumbnail">
					</td>

					<td>{{ $ve->estado}}</td>

					<a href="{{route('vehiculo.edit', $mar->idvehiculo)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
			   @include('alquiler.vehiculo.modal')
				@endforeach
			</table>
		</div>
		{{ $vehiculos->render()}}
	</div>
</div>

@endsection