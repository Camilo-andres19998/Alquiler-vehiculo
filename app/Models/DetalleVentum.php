<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVentum
 * 
 * @property int $iddetalle_venta
 * @property int $id_venta
 * @property int $idvehiculo
 * @property int $cantidad
 * @property float $precio_venta
 * @property float $descuento
 * 
 * @property Ventum $ventum
 * @property Vehiculo $vehiculo
 *
 * @package App\Models
 */
class DetalleVentum extends Model
{
	protected $table = 'detalle_venta';
	protected $primaryKey = 'iddetalle_venta';
	public $timestamps = false;

	protected $casts = [
		'id_venta' => 'int',
		'idvehiculo' => 'int',
		'cantidad' => 'int',
		'precio_venta' => 'float',
		'descuento' => 'float'
	];

	protected $fillable = [
		'id_venta',
		'idvehiculo',
		'cantidad',
		'precio_venta',
		'descuento'
	];

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'id_venta');
	}

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'idvehiculo');
	}
}
