<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $guarded = [
        'id'
    ];

    public function cliente()
    {
        return $this->hasOne(UsuarioCliente::class, 'usuario_id');
    }
}
