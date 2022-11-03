<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consulta
 *
 * @property $id
 * @property $id_materia
 * @property $id_profesor
 * @property $fecha
 * @property $tipo
 * @property $lugar
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Inscripcione[] $inscripciones
 * @property Materia $materia
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consulta extends Model
{
    
    static $rules = [
		'id_materia' => 'required',
		'id_profesor' => 'required',
		'fecha' => 'required',
		'tipo' => 'required',
		'lugar' => 'required',
        'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_materia','id_profesor','fecha','tipo','lugar','nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripciones()
    {
        return $this->hasMany('App\Models\Inscripcione', 'id_consulta', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_materia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_profesor');
    }
    

}
