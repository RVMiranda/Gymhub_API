<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrenadorCliente extends Model
{
    //
    protected $table = 'entrenador_cliente';

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class, 'id_entrenador');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function clases()
    {
        return $this->hasMany(ClaseConClientes::class, 'id_entrenador_cliente');
    }

    public function agenda()
    {
        return $this->hasMany(EntrenadorAgenda::class, 'id_entrenador_cliente');
    }
}
