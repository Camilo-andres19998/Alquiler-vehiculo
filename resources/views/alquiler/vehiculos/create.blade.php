@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Categoría</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'/alquiler/vehiculos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="modal-body">
                <form id="frmCarreras" method="POST" action="{{url("marcas")}}">
                    @csrf

            <div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">


            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" value="{{old('modelo')}}" class="form-control" placeholder="Descripción...">
            </div>
			</div>


        	<div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="marca" value="{{old('marca')}}" class="form-control" placeholder="Descripción...">
            </div>
			</div>



            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection