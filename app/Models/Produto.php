<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';
    protected $guarded = [
        'id'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(ProdutoCategoria::class, 'categoria_id');
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(ProdutoFornecedor::class, 'fornecedor_id');
    }

    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
    }
}
