<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 * 
 * @property int $idpersona
 * @property string $tipo_persona
 * @property string $nombre
 * @property string|null $tipo_documento
 * @property string|null $num_documento
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $email
 * 
 * @property Collection|Ingreso[] $ingresos
 * @property Collection|Ventum[] $venta
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'persona';
	protected $primaryKey = 'idpersona';
	public $timestamps = false;

	protected $fillable = [
		'tipo_persona',
		'nombre',
		'tipo_documento',
		'num_documento',
		'direccion',
		'telefono',
		'email'
	];

	public function ingresos()
	{
		return $this->hasMany(Ingreso::class, 'idmecanico');
	}

	public function venta()
	{
		return $this->hasMany(Ventum::class, 'idcliente');
	}
}
