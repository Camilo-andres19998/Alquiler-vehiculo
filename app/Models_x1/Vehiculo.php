<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';

    protected $primaryKey = 'idvehiculo';

    public $timestamps = false;


    protected $fillable = [
        
        'idmarca',
        'patente',
        'marca',
        'modelo',
        'venta',
        'descripcion',
        'imagen',
        'estado'
    ];


   protected $guarded =[

   ];


}
