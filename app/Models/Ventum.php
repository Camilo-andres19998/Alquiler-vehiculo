<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventum
 * 
 * @property int $idventa
 * @property int $idcliente
 * @property string $tipo_comprobante
 * @property string $serie_comprobante
 * @property string $num_comprobante
 * @property Carbon $fecha_hora
 * @property float $impuesto
 * @property float $total_venta
 * @property string $estado
 * 
 * @property Persona $persona
 * @property Collection|DetalleVentum[] $detalle_venta
 *
 * @package App\Models
 */
class Ventum extends Model
{
	protected $table = 'venta';
	protected $primaryKey = 'idventa';
	public $timestamps = false;

	protected $casts = [
		'idcliente' => 'int',
		'impuesto' => 'float',
		'total_venta' => 'float'
	];

	protected $dates = [
		'fecha_hora'
	];

	protected $fillable = [
		'idcliente',
		'tipo_comprobante',
		'serie_comprobante',
		'num_comprobante',
		'fecha_hora',
		'impuesto',
		'total_venta',
		'estado'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idcliente');
	}

	public function detalle_venta()
	{
		return $this->hasMany(DetalleVentum::class, 'id_venta');
	}
}
