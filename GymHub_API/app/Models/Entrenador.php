<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    //
    protected $table = 'entrenador';

    // En el modelo Entrenador
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function clientes()
    {
        return $this->hasMany(EntrenadorCliente::class, 'id_entrenador');
    }

    public function clasesGrupales()
    {
        return $this->hasMany(ClasesGrupales::class, 'id_entrenador');
    }

    public function clasesConClientes()
    {
        return $this->hasMany(ClaseConClientes::class, 'id_entrenador_cliente');
    }

    public function tiposEjercicio()
    {
        return $this->belongsToMany(TiposEjercicio::class, 'entrenador_tipo_ejercicio', 'id_entrenador', 'id_tipo_ejercicio');
    }

}
