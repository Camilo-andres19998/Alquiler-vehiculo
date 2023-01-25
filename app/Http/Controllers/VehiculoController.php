<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\VehiculoFormRequest;
use App\Vehiculo;
use DB;



class VehiculoController extends Controller
{
    public function __construct()
    {

    }


    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $vehiculos=DB::table('vehiculo as ve')
            ->join('marca as m', 've.idmarca' , '=', 'm.idmarca')
            ->select('ve.idvehiculo','ve.marca','ve.patente','ve.venta','m.nombre as marca','m.descripcion','ve.imagen','ve.estado')
            ->where('ve.nombre','LIKE','%'.$query.'%')
           
            ->orderBy('ve.idmarca','asc')
            ->paginate(7);
            return view('alquiler.vehiculo.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
        }
    }


    public function create()
    {
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("alquiler.vehiculo.create",["marcas"=>$marcas]);
    }



    public function store (VehiculoFormRequest $request)
    {
        $vehiculo=new Vehiculo;
        $vehiculo->idmarca=$request->get('idmarca');
        $vehiculo->patente=$request->get('patente');
        $vehiculo->marca=$request->get('marca');
        $vehiculo->modelo=$request->get('modelo');
        $vehiculo->venta=$request->get('venta');
        $vehiculo->descripcion=$request->get('descripcion');
        $vehiculo->estado='Activo';

        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'imagenes/vehiculos/',$file->getClientOriginalName());
            $vehiculo->imagen=$file->getClientOriginalName();
         }  

        $marca->save();
        return Redirect::to('alquiler/vehiculo');

    }



    public function show($id)
    {
        return view("alquiler.vehiculo.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
    }


    
    public function edit($id)
    {
        $vehiculo=Vehiculo::findOrFail($id);
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("alquiler.vehiculo.edit",["vehiculo"=>$vehiculo,"marcas" => $marcas]);
    }




    public function update(VehiculoFormRequest $request,$id){

        $vehiculo=Vehiculo::findOrFail($id);

        $vehiculo->idmarca=$request->get('idmarca');
        $vehiculo->patente=$request->get('patente');
        $vehiculo->marca=$request->get('marca');
        $vehiculo->modelo=$request->get('modelo');
        $vehiculo->venta=$request->get('venta');
        $vehiculo->descripcion=$request->get('descripcion');
    
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'imagenes/vehiculos/',$file->getClientOriginalName());
            $vehiculo->imagen=$file->getClientOriginalName();
         }

        $vehiculo->update();
        return Redirect::to('alquiler/vehiculo');

       }



       public function destroy($id)
       {
           $vehiculo=Vehiculo::findOrFail($id);
           $vehiculo->estado='Inactivo';
           $vehiculo->update();
           return Redirect::to('alquiler/vehiculo');
       }
   



}





