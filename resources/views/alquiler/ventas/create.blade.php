@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Persona</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'/alquiler/ventas','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

         <div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre...">
            </div>

			</div>

			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="tipo_persona">Tipo persona</label>
            	<input type="text" name="tipo_persona" class="form-control" value="{{old('tipo_persona')}}" placeholder="Nombre...">
            </div>

			</div>

			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="direccion">Direccion</label>
            	<input type="text" name="direccion" class="form-control" value="{{old('nombre')}}" placeholder="Direccion...">
            </div>
			</div>

			
			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
            <div class="form-group">
            	<label>Documento</label>
            	<select name="tipo_documento" class="form-control" value="{{old('tipo_documento')}}">
				    <option value="DNI">DNI</option>
					<option value="RUT">RUT</option>
					<option value="PAS">PAS</option>
				</select>
			
            </div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="num_documento">Numero documento</label>
            	<input type="text" name="num_documento" class="form-control" value="{{old('num_documento')}}" placeholder="Tipo documento...">
            </div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{old('telefono')}}" placeholder="Telefono...">
            </div>
			</div>


			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
			<div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Correo...">
            </div>
			</div>

         

		
			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
			</div>
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection