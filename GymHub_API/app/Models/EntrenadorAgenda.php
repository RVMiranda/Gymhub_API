<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrenadorAgenda extends Model
{
    //
    protected $table = 'entrenador_agenda';

    public function entrenadorCliente()
    {
        return $this->belongsTo(EntrenadorCliente::class, 'id_entrenador_cliente');
    }
}
