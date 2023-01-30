<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;

use DB;


class MecanicoController extends Controller
{
    public function __construct()
    {

    }


    public function index(Request $request)
    {
        if ($request){

      
       $texto=trim($request->get('texto'));
       $persona=DB::table('persona')
          ->where('nombre','LIKE','%' .$texto.'%')
          ->where('tipo_persona','=', 'Mecanico')
          ->orWhere('num_documento','LIKE','%' .$texto. '%')
          ->orderBy('idpersona','asc')
          ->paginate(10);
       return view('alquiler.mecanico.index',["persona" =>$persona,"texto"=>$texto]);
        
    }

}


    public function create()
    {
        return view("alquiler.mecanico.create");
    }
    public function store (PersonaFormRequest $request)
    {
        $persona=new Persona;
        $persona->idpersona = $request->get('idpersona') ;
        $persona->tipo_persona='Mecanico';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();

        return Redirect::to('alquiler/mecanico');

    }



    public function show($id)
    {
        return view("alquiler.mecanico.show",["persona"=>Persona::findOrFail($id)]);
    }


    
    public function edit($id)
    {
        return view("alquiler.mecanico.edit",["persona"=>Persona::findOrFail($id)]);
    }



    public function update(PersonaFormRequest $request,$id){
        $persona=Persona::findOrFail($id);
        
        $persona->update($request->all());
        return Redirect::to('alquiler/mecanico');
       }

       public function destroy($id)
       {
           $persona=Persona::findOrFail($id);
           $persona->tipo_persona='Inactivo';
           $persona->update();
           return Redirect::to('alquiler/mecanico');
       }



}





