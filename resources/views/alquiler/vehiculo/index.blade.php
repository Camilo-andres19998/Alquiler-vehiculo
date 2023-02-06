@extends ('layouts.admin')
@section ('contenido')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de vehiculo <a href="vehiculo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

</head>
<body>
	<div class="container">
     
	   <div class="row">
      <div class="col-xl-12">
		<form action="">
         <div class="form-row">
           <div class="col-sm-4">
               <input type="text" class="form-control" name="texto">
		   </div>
		   <div class="col-auto">
              <input type="submit" class="btn btn-primary" value="Buscar">
		   </div>
		 </div>
		 </form>
		</div>
	<div class="col-sm-12">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
      	<thead>
		            <th>IdVehiculo</th>
					<th>Modelo</th>
					<th>Patente</th>
					
					<th>Venta</th>
					<th>Estado</th>
					<th>Imagen</th>
					<th>Opciones</th>
					</tr>
				</thead>
        <tbody>
			@if(count($vehiculos)<=0)
              <tr>
				<td colspan="8">No hay resultados</td>
			  </tr>
			@else
			@foreach ($vehiculos as $ve)
            <tr> 
				
			       <td>{{ $ve->idvehiculo}}</td>
				  
					<td>{{ $ve->modelo}}</td>
					<td>{{ $ve->patente}}</td>
					
					<td>{{ $ve->venta}}</td>
					<td>{{ $ve->estado}}</td>
					<td>
					<img src="{{asset('imagenes/vehiculo/'.$ve->imagen)}}" alt="{{ $ve->idvehiculo}}" height="100px" width="100px" class="img-thumbnail">
                
					<td>

					<a href="{{route('vehiculo.edit', $ve->idvehiculo)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>


			</tr>
			@include('alquiler.vehiculo.modal')
@endforeach
@endif
</tbody>
</table>

 </div>
	</div>
		
	

</div>


</body>
</html>


@endsection