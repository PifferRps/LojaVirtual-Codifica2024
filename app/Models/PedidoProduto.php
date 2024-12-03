<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoProduto extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_produtos';
    protected $guarded = [
        'id'
    ];
}
