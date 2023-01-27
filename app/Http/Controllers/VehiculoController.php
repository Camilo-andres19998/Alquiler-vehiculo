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
        $texto=trim($request->get('texto'));
            $vehiculo=DB::table('vehiculo')
            ->select('idvehiculo','idmarca','marca','modelo','patente','venta','descripcion','imagen','estado')
            ->where('marca','LIKE','%'.$texto.'%')
           
            ->orderBy('idmarca','asc')
            ->paginate(5);
        return view('alquiler.vehiculo.index', compact('vehiculo','texto'));
        
    }


    public function create()
    {
        
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("alquiler.vehiculo.create",["marcas"=>$marcas]);
    }



    public function store(VehiculoFormRequest $request)
    {   
    
        $inputs   = $request->all() ;
  
        $vehiculo = new Vehiculo;
        
        $vehiculo->patente = $request->get('patente') ;
        $vehiculo->modelo = $request->get('modelo') ;
        $vehiculo->marca = $request->get('marca') ;
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





