<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    //
    protected $table = 'trabajador';
    
    public function entrenador()
    {
        return $this->hasOne(Entrenador::class, 'id_trabajador');
    }
}
