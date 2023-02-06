<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingreso
 * 
 * @property int $idingreso
 * @property int $idmecanico
 * @property string $tipo_comprobante
 * @property string|null $serie_comprobante
 * @property string $num_comprobante
 * @property Carbon $fecha_hora
 * @property float $impuesto
 * @property string $estado
 * 
 * @property Persona $persona
 * @property Collection|DetalleHistorico[] $detalle_historicos
 *
 * @package App\Models
 */
class Ingreso extends Model
{
	protected $table = 'ingreso';
	protected $primaryKey = 'idingreso';
	public $timestamps = false;

	protected $casts = [
		'idmecanico' => 'int',
		'impuesto' => 'float'
	];

	protected $dates = [
		'fecha_hora'
	];

	protected $fillable = [
		'idmecanico',
		'tipo_comprobante',
		'serie_comprobante',
		'num_comprobante',
		'fecha_hora',
		'impuesto',
		'estado'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idmecanico');
	}


	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'idvehiculo');
	}




	public function detalle_historicos()
	{
		return $this->hasMany(DetalleHistorico::class, 'idingreso');
	}
}
