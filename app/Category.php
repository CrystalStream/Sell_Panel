<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;
use APISELL\Product;

class Category extends Model
{
 	protected $fillable = [
        'name', 'status',
    ];

    public function products(){
    	return $this->hasMany('APISELL\Product');
    }
}
