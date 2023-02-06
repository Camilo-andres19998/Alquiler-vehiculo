<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Marca;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MarcaFormRequest;
use DB;

class MarcaController extends Controller
{
    public function __construct()
    {

    }


    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $marcas=DB::table('marca')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idmarca','asc')
            ->paginate(7);
            return view('alquiler.marca.index',["marcas"=>$marcas,"searchText"=>$query]);
        }
    }


    public function create()
    {
        return view("alquiler.marca.create");
    }




    
    public function store (MarcaFormRequest $request)
    {
        $marca=new Marca;
        $marca->nombre=$request->get('nombre');
        $marca->descripcion=$request->get('descripcion');
        $marca->condicion='1';
        $marca->save();
        return Redirect::to('alquiler/marca');

    }



    public function show($id)
    {
        return view("alquiler.marca.show",["marca"=>Marca::findOrFail($id)]);
    }


    
    public function edit($id)
    {
        return view("alquiler.marca.edit",["marca"=>Marca::findOrFail($id)]);
    }



    public function update(MarcaFormRequest $request,$id){
        $marca=Marca::findOrFail($id);
        $marca->update($request->all());
        return Redirect::to('alquiler/marca');
       }

       public function destroy($id)
       {
           $marca=Marca::findOrFail($id);
           $marca->condicion='0';
           $marca->update();
           return Redirect::to('alquiler/marca');
       }
   



}



