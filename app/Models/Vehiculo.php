<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 * 
 * @property int $idvehiculo
 * @property int|null $idmarca
 * @property string|null $patente
 * @property string $marca
 * @property string $modelo
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property string $estado
 * @property int|null $venta
 * 
 * @property Collection|DetalleHistorico[] $detalle_historicos
 * @property Collection|DetalleVentum[] $detalle_venta
 *
 * @package App\Models
 */
class Vehiculo extends Model
{
	protected $table = 'vehiculo';
	protected $primaryKey = 'idvehiculo';
	public $timestamps = false;

	protected $casts = [
		'idmarca' => 'int',
		'venta' => 'int'
	];

	protected $fillable = [
		//'idmarca',
		'patente',
		'modelo',
		'descripcion',
		'imagen',
		'estado',
		'venta'
	];

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'idmarca');
	}

	public function detalle_historicos()
	{
		return $this->hasMany(DetalleHistorico::class, 'idvehiculo');
	}

	public function detalle_venta()
	{
		return $this->hasMany(DetalleVentum::class, 'idvehiculo');
	}
}
