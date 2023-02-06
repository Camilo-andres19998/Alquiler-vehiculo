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

	 <a href="vehiculos/create"><button class="btn btn-success">Nuevo</button></a>
		
	</div>
</div>



<div class="row mt-3">
    <div class="col-12 col-lg-8 offset-0 offset-lg-2">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
                    <th>#</th>
                    <th>Marca</th>
					<th>Modelo</th>
                    <th>Opciones</th>
                      



                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($vehiculos as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->marca }}</td>
                            <td>{{ $row->modelo }}</td>
                        
                           
                            <td>
                           
                            <a href="{{route('vehiculos.edit', $row->id)}}"><button class="btn btn-info">Editar</button></a>
<a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
</td>
                           
                                <form method="POST" action="{{ url('vehiculos',[$row]) }}">
                                    @method("delete")
                                    @csrf
                                    <td>



                                </form>
                           
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCarreras" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="h5" id="titulo_modal">Añadir alumnos</label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmCarreras" method="POST" action="{{url("vehiculos")}}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="nombre" class="form-control" maxlength="50" placeholder="Nombre" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                        <input type="email" name="correo" class="form-control" maxlength="50" placeholder="Correo" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select name="id_carrera" class="form-select" required>
                            <option value="">Carera</option>
                            @foreach($marcas as $row)
                            <option value="{{ $row->id}}">{{ $row->marca}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success" ><i class="fa-solid fa-floppy-disk"></i>  Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


@endsection