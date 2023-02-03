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
        if ($request){

      
       $texto=trim($request->get('texto'));
       $ingresos=DB::table('ingreso as i')
       ->join('persona as p','i.idmecanico','=','p.idpersona')
       ->join('detalle_historico as di','i.idingreso', '=', 'di.idingreso')
       ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
        ->where('i.num_comprobante','LIKE','%'.$texto. '%'.$texto.'%')
        ->orderBy('i.idingreso','asc')
        ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
        ->paginate(7);

        return view('alquiler.ingreso.index',["ingresos"=>$ingresos,"texto"=>$texto]);
    }

}

public function create(){

    $personas=DB::table('persona')->where('tipo_persona','=','Mecanico')->get();
    $vehiculos = DB::table('vehiculo as v')
    ->select(DB::raw('CONCAT(v.patente, " ",v.modelo) AS vehiculo'),'v.idvehiculo')
    ->where('v.estado','=','Activo')
    ->get();
    return view("alquiler.ingreso.create", ["personas"=> $personas, "vehiculos" => $vehiculos]);
}



public function store (IngresoFormRequest $request){

    try{

        DB::beginTransaction();
        $ingreso=new Ingreso;
        $ingreso->idmecanico=$request->get('idmecanico');
        $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
        $ingreso->serie_comprobante=$request->get('serie_comprobante');
        $ingreso->num_comprobante=$request->get('num_comprobante');

        $mytime = Carbon::now('America/Santiago');
        $ingreso->fecha_hora=$mytime->toDateTimeString();
        $ingreso->impuesto='18';
        $ingreso->estado='A';
        $ingreso->save();

        $idvehiculo = $request->get('idvehiculo');
        $cantidad  = $request->get('cantidad');
        $precio_compra = $request->get('precio_compra');
        $precio_venta = $request->get('precio_venta');

        $cont = 0;

        while($cont < count($idvehiculo)){
           $detalle = new DetalleHistorico();
           $detalle->idingreso= $ingreso->idingreso;
           $detalle->idvehiculo= $idvehiculo[$cont];
           $detalle->cantidad = $cantidad[$cont];
           $detalle->precio_compra = $precio_compra[$cont];
           $detalle->precio_venta = $precio_venta[$cont];
           $detalle->save();

            $cont=$cont+1;
        }

        DB::commit();

    } catch(\Exception $e)
    {
      DB::rollback();
    }

    return Redirect__to('alquiler/ingreso');

}

public function show($id)
{
  $ingreso = DB::table('ingreso as i')
  ->join('persona as p','i.idmecanico','=','p.idpersona')
  -join('detalle_historico as hi','i.idingreso','=','hi.idingreso')
  ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
  ->where('i.idgreso','=',$id)
  ->first();

  $detalles=DB::table('detalle_historico as d')
    ->join('vehiculo as v','d.idvehiculo','=','v.idvehiculo')
    ->select('v.nombre as vehiculo','d.cantidad','d.precio_compra','d.precio_venta')
    ->where('d.idingreso','=',$id)
    ->get();

    return view("alquiler.ingreso.show",["ingreso" =>$ingreso,"detalles"=> $detalles]);


}

public function destroy($id){
    $ingreso =Ingreso::findOrFail($id);
    $ingreso->Estado='C';
    $ingreso->update();
    return Redirect::to('alquiler/ingreso');
}

}
