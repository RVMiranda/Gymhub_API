<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaseConClientes extends Model
{
    //
    protected $table = 'clases_con_clientes';

    public function entrenadorCliente()
    {
        return $this->belongsTo(EntrenadorCliente::class, 'id_entrenador_cliente');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase');
    }
}
