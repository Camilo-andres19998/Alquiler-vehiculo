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
		<h3>Listado de personas <a href="ventas/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
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
		            <th>#</th>
					<th>Tipo persona</th>
					<th>Nombre</th>
					<th>Correo</th>
                    <th>Tipo Doc</th>
					<th>Numero Doc</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Opciones</th>
					</tr>
				</thead>
        <tbody>
		
			  @foreach ($persona as $per)
            <tr> 
				
			       <td>{{ $per->idpersona}}</td>
				   <td>{{ $per->tipo_persona}}</td>
                   <td>{{ $per->nombre}}</td>
				   <td>{{ $per->email}}</td>
                   <td>{{ $per->tipo_documento}}</td>
                   <td>{{ $per->num_documento}}</td>	
                   <td>{{ $per->telefono}}</td>
				   
                   <td>{{ $per->direccion}}</td>
				  

                    <td>
					<a href="{{route('ventas.edit', $per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>


			</tr>
			@include('alquiler.ventas.modal')
@endforeach

</tbody>
</table>

 </div>
 {{$persona->render()}}
	</div>
		
	

</div>


</body>
</html>


@endsection