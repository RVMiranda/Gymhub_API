<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'cliente';

    public function entrenadorCliente()
    {
        return $this->hasMany(EntrenadorCliente::class, 'id_cliente');
    }
}
