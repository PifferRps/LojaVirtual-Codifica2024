<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoFornecedor extends Model
{
    use SoftDeletes;

    protected $table = 'produtos_fornecedores';
    protected $guarded = [
        'id'
    ];

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class, 'fornecedor_id');
    }
}
