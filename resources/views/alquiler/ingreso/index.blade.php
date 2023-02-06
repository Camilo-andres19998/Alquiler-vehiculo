@extends ('layouts.admin')
@section ('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<h3>Ingresos <a href="ingreso/ingreso"><button class="btn btn-success">Nuevo</button></a></h3>
	@include('alquiler.ingreso.search')
</head>
<body>
	<div class="container">
       <h4>Gestion de ingresos</h4>
	   <div class="row">
         <div class="col-lx-12">
          <div class="table-responsive">
            <table class="table table-striped">
               <thead>

				     <tr>

					 <th>Fecha</th>
					 <th>Nombre dueño</th>
					 <th>Vehiculo</th>
					 <th>Modelo</th>
					 <th>Marca vehiculo</th>
					 <th>Año</th>
					
					
					 <th>Opciones</th>

					 </tr>

			   </thead>
               @foreach ($ingresos as $in)
                  <tr>
                    <td>{{ $in->fecha_hora  }}</td>
					<td>{{ $in->nombre  }}</td>
					<td>{{ $in->nombre  }}</td>
					<td>{{ $in->nombre  }}</td>
					<td>{{ $in->nombre  }}</td>
					<td>{{ $in->nombre  }}</td>
					
					<td>

					<a href="{{route('ingreso.edit', $in->idingreso)}}"><button class="btn btn-info">Detalles</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>

					</td>
				  </tr>
				  @include('alquiler.ingreso.modal')
            @endforeach
			</table>
		  </div>
		 </div>
	   </div>
	</div>
</body>
</html>



@endsection



