<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Ingreso;

use App\Models\DetalleHistorico;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoFormRequest;

use DB;

use Carbon\Carbon;

class IngresoController extends Controller
{ 

    public function __construct()
    {

    }


  public function index(Request $request)
{
    if($request)
    {
        $query=trim($request->get('texto'));
        $ingresos = DB::table('ingreso as i')
            ->leftJoin('persona as p','i.idmecanico','=','p.idpersona')
            ->leftJoin('detalle_historico as di','i.idingreso','=','di.idingreso')
            ->leftJoin('vehiculo as v','di.idvehiculo','=','v.idvehiculo')
            ->select('i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', 'v.patente', 'v.modelo', DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.num_comprobante','LIKE','%' .$query.'%')
            ->orderBy('i.idingreso','asc')
            ->groupBy('i.idingreso','i.fecha_hora','p.nombre', 'i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado','v.patente','v.modelo')
            ->paginate(7);

        return view('alquiler.ingreso.index', compact('ingresos'), ["texto"=>$query]);
    }
}



public function create(){

  
    $personas=DB::table('persona')->where('tipo_persona','=','Mecanico')->get();
    $vehiculos = DB::table('vehiculo as v')
      ->select(DB::raw('CONCAT(v.patente, " ", v.modelo) AS vehiculo'),'v.idvehiculo')
      ->where('v.estado','=','Activo')
      ->get();
    //  dd($vehiculos);
    return view("alquiler.ingreso.create", ["personas"=> $personas, "vehiculos" => $vehiculos]);
  }
  


public function edit($id)
{
    return view("alquiler.ingreso.edit",["ingreso"=>Ingreso::findOrFail($id)]);
}



public function update(IngresoFormRequest $request,$id){
    $ingreso=Ingreso::findOrFail($id);
    $ingreso->update($request->all());
    return Redirect::to('alquiler/ingreso');



   }



public function destroy($id){
    $ingreso =Ingreso::findOrFail($id);
    $ingreso->Estado='C';
    $ingreso->update();
    return Redirect::to('alquiler/ingreso');
}






  public function store(Request $request){
    $ingreso = new Ingreso;
    $ingreso->idpersona = $request->get('idpersona');
    $ingreso->idvehiculo = $request->get('idvehiculo');
    $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
    $ingreso->descripcion = $request->get('descripcion');
    $ingreso->save();
    return Redirect::to('alquiler/ingreso');
  }



  
  public function show($id){
    $ingreso = Ingreso::findOrFail($id);
    $detalles = DB::table('detalle_ingreso as di')
      ->join('articulo as a','di.idarticulo','=','a.idarticulo')
      ->select('a.nombre as articulo','di.cantidad','di.precio_compra')
      ->where('di.idingreso','=',$id)
      ->get();
    return view("alquiler.ingreso.show", ["ingreso" => $ingreso, "detalles" => $detalles]);
  }
  

}
