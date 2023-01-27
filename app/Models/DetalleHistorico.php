<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleHistorico
 * 
 * @property int $iddetalle_historico
 * @property int $idingreso
 * @property int $idvehiculo
 * @property int $cantidad
 * @property float $precio_compra
 * @property float $precio_venta
 * 
 * @property Ingreso $ingreso
 * @property Vehiculo $vehiculo
 *
 * @package App\Models
 */
class DetalleHistorico extends Model
{
	protected $table = 'detalle_historico';
	protected $primaryKey = 'iddetalle_historico';
	public $timestamps = false;

	protected $casts = [
		'idingreso' => 'int',
		'idvehiculo' => 'int',
		'cantidad' => 'int',
		'precio_compra' => 'float',
		'precio_venta' => 'float'
	];

	protected $fillable = [
		'idingreso',
		'idvehiculo',
		'cantidad',
		'precio_compra',
		'precio_venta'
	];

	public function ingreso()
	{
		return $this->belongsTo(Ingreso::class, 'idingreso');
	}

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'idvehiculo');
	}
}
