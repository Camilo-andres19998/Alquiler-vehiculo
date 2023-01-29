<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 * 
 * @property int $idmarca
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $condicion
 * 
 * @property Collection|Vehiculo[] $vehiculos
 *
 * @package App\Models
 */
class Marca extends Model
{
	protected $table = 'marca';
	protected $primaryKey = 'idmarca';
	public $timestamps = false;

	protected $casts = [
		'condicion' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'condicion'
	];

	//public function vehiculos()
	//{
//		return $this->hasMany(Vehiculo::class, 'idmarca');
//	}



	public function vehiculos(){
		return $this->hasMany('App\Models\Vehiculo','idmarca','idmarca');
	}
}
