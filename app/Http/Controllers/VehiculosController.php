<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\VehiculosFormRequest;
use App\Models\Vehiculos;
use App\Models\Marcas;
use DB;
class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculos::select('vehiculos.idvehiculo', 'vehiculos.modelo', 'vehiculos.idmarca', 'marcas.marca as marca')
        ->leftjoin('marcas', 'marcas.idmarca', '=', 'vehiculos.idmarca')
        ->get();
        $marcas = Marcas::all();
        return view('alquiler.vehiculos.index', compact('vehiculos', 'marcas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("alquiler.vehiculos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


  
     public function store (VehiculosFormRequest $request)
     {
        $vehiculo = new Vehiculos($request->all());
        $vehiculo->saveOrFail();
         return Redirect::to('alquiler/vehiculos');
 
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculos::find($id);
        $marcas = Marcas::all();
        return view("alquiler.vehiculos.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo=Vehiculo::findOrFail($id);
        $marcas = Marcas::all();
        return view("alquiler.vehiculos.edit",["vehiculo"=>$vehiculo,"marcas" => $marcas]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculos::find($id);
        $vehiculo->fill($request->input())->saveOrFail();
        return redirect('vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marcas::find($id);
        $marca->delete();
        return redirect('marcas');

    }
}
