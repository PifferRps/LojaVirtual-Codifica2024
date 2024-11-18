<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
    use SoftDeletes;

    protected $table = 'produtos_categorias';
    protected $guarded = [
        'id'
    ];
}
