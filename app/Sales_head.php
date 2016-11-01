<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;

class Sales_head extends Model
{
    protected $fillable = [
        'user_id', 'sale_id',
    ];
}
