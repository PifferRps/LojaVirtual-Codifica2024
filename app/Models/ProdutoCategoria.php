<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoCategoria extends Model
{
    use SoftDeletes;

    protected $table = 'produtos_categorias';
    protected $guarded = [
        'id'
    ];

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }
}
