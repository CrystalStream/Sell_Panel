<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'status',
    ];

    public function users(){
    	return $this->belongsTo('APPSELL\User');
    }

    public function products(){
    	return $this->hasMany('APPSELL\Product');
    }
}
