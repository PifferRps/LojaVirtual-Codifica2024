<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';
    protected $guarded = [
        'id'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(UsuarioCliente::class, 'usuario_id');
    }

    public function endereco(): BelongsTo
    {
        return $this->belongsTo(ClienteEndereco::class, 'endereco_id');
    }

    public function formaPagamento(): BelongsTo
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_pagamento_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(PedidoStatus::class, 'status_id', 'id');
    }

    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class, 'pedidos_produtos', 'pedido_id', 'produto_id')
            ->withPivot('quantidade_vendida');
    }
}
