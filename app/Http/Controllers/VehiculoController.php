<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\VehiculoFormRequest;
use App\Models\Vehiculo;
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

      $texto=trim($request->get('texto'));
      $vehiculo = DB::table('vehiculo as v')
    ->leftJoin('marca as m', 'v.idmarca', '=', 'm.idmarca')
    ->select('v.idvehiculo','v.modelo','v.patente','v.venta','m.nombre as marca','v.descripcion','v.imagen','v.estado')
    ->where('v.modelo','LIKE','%'.$texto.'%')
    ->orderBy('v.idvehiculo','asc')
    ->paginate(7);
            return view('alquiler.vehiculo.index',["vehiculo"=>$vehiculo,"texto"=>$texto]);
     }

    }

    public function create()
    {
        
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("alquiler.vehiculo.create",["marcas"=>$marcas]);
    }



    public function store(VehiculoFormRequest $request)
    {   
    
        $inputs   = $request->all() ;
        //dd($inputs);
        $vehiculo = new Vehiculo;
        $vehiculo->idvehiculo = $request->get('idvehiculo') ;
        $vehiculo->patente = $request->get('patente') ;
        $vehiculo->modelo = $request->get('modelo') ;
        //$vehiculo->marca = $request->get('marca') ;
        $vehiculo->venta = $request->get('venta') ;
        $vehiculo->descripcion = $request->get('descripcion') ;
        $vehiculo->estado = "Activo" ;

        if ($request->HasFile('imagen')) {
  
            $file = $request->File('imagen');

            $file->move( public_path().'/imagenes/vehiculo/' , $file->getClientOriginalName() ) ;
            $vehiculo->imagen = $file->getClientOriginalName() ;
        }

        $vehiculo->save();
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





