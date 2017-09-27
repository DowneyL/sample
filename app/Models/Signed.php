<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signed extends Model
{
    //
    protected $fillable = [
        'corporate',
        'tel',
        'contacts'
    ];
}
