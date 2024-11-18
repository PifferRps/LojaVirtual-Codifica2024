<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoStatus extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_status';
    protected $guarded = [
        'id'
    ];
}
