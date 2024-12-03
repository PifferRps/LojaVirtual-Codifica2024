<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 */
class UsuarioCliente extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios_clientes';
    protected $guarded = [
        'id'
    ];
}
