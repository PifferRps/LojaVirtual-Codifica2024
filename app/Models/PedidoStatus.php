<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PedidoStatus extends Model
{
    public $timestamps = false;
    protected $table = 'pedidos_status';
    protected $guarded = [
        'id'
    ];

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, 'status_id');
    }
}
