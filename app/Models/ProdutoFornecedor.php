<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoFornecedor extends Model
{
    use SoftDeletes;

    protected $table = 'produtos_fornecedores';
    protected $guarded = [
        'id'
    ];
}