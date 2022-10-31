<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 *
 * @property $id
 * @property $nombre
 * @property $carrera
 * @property $anio
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta[] $consultas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materia extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'carrera' => 'required',
		'anio' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','carrera','anio','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'id_materia', 'id');
    }
    

}
