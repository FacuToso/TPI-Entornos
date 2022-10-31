<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscripcione
 *
 * @property $id
 * @property $id_alumno
 * @property $id_consulta
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta $consulta
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inscripcione extends Model
{
    
    static $rules = [
		'id_alumno' => 'required',
		'id_consulta' => 'required',
		'observaciones' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_alumno','id_consulta','observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consulta()
    {
        return $this->hasOne('App\Models\Consulta', 'id', 'id_consulta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_alumno');
    }
    

}
