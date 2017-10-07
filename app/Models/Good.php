<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';
    protected $fillable = [
        'goods_id', 'gname', 'gimg', 'gstock', 'probability', 'description',
    ];
}
