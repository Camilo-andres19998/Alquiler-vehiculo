@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de vehiculo <a href="vehiculo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	

	
		<form action="{{route('vehiculo.index')}}" method="get">
			<div class="col-xl-12">
             <div class="form-row">
			<div class="col-sm-4 my-1">
				<input type="text" class="form-control" name="texto" value="{{$texto}}">
				</div>
				<div class="col-auto my-1">
<input type="submit" class="btn btn-primary" value="Buscar">
				
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>Id</th>
					<th>Modelo</th>
					<th>Patente</th>
					<th>Marca</th>
					<th>Venta</th>
					<th>Estado</th>
					<th>Imagen</th>
					<th>Opciones</th>

				</thead>
               @foreach ($vehiculo as $ve)
				<tr>

					<td>{{ $ve->idvehiculo}}</td>
					<td>{{ $ve->modelo}}</td>
					<td>{{ $ve->patente}}</td>
					<td>{{ $ve->marca}}</td>
					<td>{{ $ve->venta}}</td>
					<td>{{ $ve->estado}}</td>
					<td>
					<img src="{{asset('imagenes/vehiculo/'.$ve->imagen)}}" alt="{{ $ve->marca}}" height="100px" width="100px" class="img-thumbnail">
                
					<td>
					
					<a href="{{route('vehiculo.edit', $ve->idvehiculo)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					
					
				</tr>
			   @include('alquiler.vehiculo.modal')
				@endforeach
			</table>
		</div>
		</div>
		</div>
		</div>
	</div>
	</div>
	</div>

	</form>
</div>

@endsection