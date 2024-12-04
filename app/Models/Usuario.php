<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static create(array $array)
 */
class Usuario extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $guarded = [
        'id'
    ];

    public function cliente(): HasOne
    {
        return $this->hasOne(UsuarioCliente::class, 'usuario_id');
    }
}
