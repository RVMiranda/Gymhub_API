<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    protected $table = 'clase';

    public function clasesConClientes()
    {
        return $this->hasMany(ClaseConClientes::class, 'id_clase');
    }
}
