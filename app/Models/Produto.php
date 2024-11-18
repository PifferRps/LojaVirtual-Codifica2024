<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';
    protected $guarded = [
        'id'
    ];
}
