<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
{
    public function __construct()
    {

    }


    public function index(Request $request)
    {
       $persona=Persona::all();
       return view('alquiler.ventas.index',compact('persona'));
        
    }


    public function create()
    {
        return view("alquiler.ventas.create");
    }
    public function store (PersonaRequest $request)
    {
        $persona=new Persona;
        $persona->tipo_persona='Cliente';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();

        return Redirect::to('alquiler/ventas');

    }



    public function show($id)
    {
        return view("alquiler.ventas.show",["persona"=>Persona::findOrFail($id)]);
    }


    
    public function edit($id)
    {
        return view("alquiler.ventas.edit",["persona"=>Persona::findOrFail($id)]);
    }



    public function update(PersonaFormRequest $request,$id){
        $persona=Persona::findOrFail($id);
        $persona->update($request->all());
        return Redirect::to('alquiler/ventas');
       }

       public function destroy($id)
       {
           $persona=Persona::findOrFail($id);
           $persona->condicion='0';
           $persona->update();
           return Redirect::to('alquiler/ventas');
       }
   



}



