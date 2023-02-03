@extends ('layouts.admin')
@section ('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
					 <th>Mecanico</th>
					 <th>Comprobante</th>
					 <th>Serie comprobante</th>
					 <th>Numero comprobante</th>
					 <th>Impuesto</th>
					
					 <th>Estado</th>
					 <th>Total</th>
					 <th>Opciones</th>

					 </tr>

			   </thead>
               @foreach ($ingresos as $in)
                  <tr>
                    <td>{{ $in->fecha_hora  }}</td>
					<td>{{ $in->nombre  }}</td>
					<td>{{ $in->tipo_comprobante}}</td>
					<td>{{ $in->serie_comprobante}}</td>
					<td>{{ $in->num_comprobante}}</td>
					<td>{{ $in->impuesto}}</td>
					
					<td>{{ $in->estado}}</td>
					<td>{{ $in->total}}</td>
					<td>

					<a href="{{route('ingreso.edit', $in->idingreso)}}"><button class="btn btn-info">Detalles</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>

					</td>
				  </tr>
            @endforeach
			</table>
		  </div>
		 </div>
	   </div>
	</div>
</body>
</html>



@endsection



