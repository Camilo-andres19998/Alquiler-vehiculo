
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
		<h3>Listado de personas <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
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
		            
					<th>Fecha</th>
					<th>Mecanico</th>
					<th>Comprobante</th>
					<th>Impuesto</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
					</tr>
				</thead>
        <tbody>
		
			  @foreach ($ingresos as $ing)
            <tr> 
				
			      <td>{{ $ing->idingreso}}</td>
				   <td>{{ $ing->fecha_hora}}</td>
                   <td>{{ $ing->nombre}}</td>
				   <td>{{ $ing->tipo_comprobante. ': '.$ing->serie_comprobante. '-'.$ing->num_comprobante}}</td>
				   <td>{{ $ing->impuesto}}</td>
				   <td>{{ $ing->total}}</td>
				   <td>{{ $ing->estado}}</td>
                    <td>
					<a href="{{route('ingreso.edit', $ing->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>


			</tr>
			@include('alquiler.ingreso.modal')
@endforeach

</tbody>
</table>

 </div>
 {{$ingresos->render()}}
	</div>
		
	

</div>


</body>
</html>


@endsection