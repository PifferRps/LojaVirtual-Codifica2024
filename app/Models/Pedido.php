<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';
    protected $guarded = [
        'id'
    ];
}
