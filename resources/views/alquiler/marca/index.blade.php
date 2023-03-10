@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de marca <a href="marca/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('alquiler.marca.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Opciones</th>
				</thead>
               @foreach ($marcas as $mar)
				<tr>
					<td>{{ $mar->idmarca}}</td>
					<td>{{ $mar->nombre}}</td>
					<td>{{ $mar->descripcion}}</td>
					<td>
					<a href="{{route('marca.edit', $mar->idmarca)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
			   @include('alquiler.marca.modal')
				@endforeach
			</table>
		</div>
		{{ $marcas->render()}}
	</div>
</div>

@endsection