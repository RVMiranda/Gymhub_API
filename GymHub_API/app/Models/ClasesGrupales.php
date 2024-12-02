<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClasesGrupales extends Model
{
    //
    protected $table = 'clases_grupales';

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase');
    }

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class, 'id_entrenador');
    }
}
