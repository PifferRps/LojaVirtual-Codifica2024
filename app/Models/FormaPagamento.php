<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormaPagamento extends Model
{
    public $timestamps = false;
    protected $table = 'formas_pagamento';
    protected $guarded = [
        'id'
    ];

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, 'forma_pagamento_id');
    }
}
