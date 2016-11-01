<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;
use APISELL\Category;

class Product extends Model
{
	protected $table = 'products';
    protected $fillable = [
        'name', 'price', 'category_id', 'photo_url','numbers'
    ];


    public function category(){
    	return $this->belongsTo('APISELL\Category');
    }

}
