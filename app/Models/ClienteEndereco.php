<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteEndereco extends Model
{
    use SoftDeletes;

    protected $table = 'clientes_enderecos';
    protected $guarded = [
        'id'
    ];
}
