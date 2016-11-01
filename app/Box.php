<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;
use APISELL\Waste;

class Box extends Model
{
    protected $fillable = [
        'name', 'current_money',
    ];

    public function wastes(){
    	return $this->hasMany('APISELL\Waste');
    }
}
