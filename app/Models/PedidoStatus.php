<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoStatus extends Model
{
    public $timestamps = false;
    protected $table = 'pedidos_status';
    protected $guarded = [
        'id'
    ];
}
