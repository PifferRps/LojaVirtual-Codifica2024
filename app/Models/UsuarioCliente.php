<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioCliente extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios_clientes';
    protected $guarded = [
        'id'
    ];
}
