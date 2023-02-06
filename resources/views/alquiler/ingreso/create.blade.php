@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	</div>
	</div>
		
			@if (count($errors)>0)
			
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'/alquiler/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

         <div class="col-lg-6 col-sm-6 col-md col-xs-6">
			<div class="form-group">
            	<label for="mecanico">Mecanico</label>
            	<select name="idmecanico" id="idmecanico" class="form-control selectpicker" data-live-search="true">
					@foreach($personas as $persona)
				    <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
					@endforeach
        </select>
        </div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md col-xs-6">
			<div class="form-group">
            	<label for="mecanico">Mecanico</label>
            	<select name="idmecanico" id="idmecanico" class="form-control selectpicker" data-live-search="true">
					@foreach($personas as $persona)
				    <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
					@endforeach
        </select>
        </div>
	</div>

		

			<div class="col-lg-6 col-sm-6 col-md col-xs-12">
            <div class="form-group">
				<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
			</div>
			</div>
			{!!Form::close()!!}		
            
		
	
@endsection