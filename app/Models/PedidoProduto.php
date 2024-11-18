<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_produtos';
    protected $guarded = [
        'id'
    ];
}
