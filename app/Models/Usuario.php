<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $guarded = [
        'id'
    ];
}
