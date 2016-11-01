<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;
use APISELL\Box;
use APISELL\User;

class Waste extends Model
{
     protected $fillable = [
        'money', 'description', 'box_id', 'user_id',
    ];

    public function box(){
    	return $this->belongsTo('APISELL\Box');
    }
    public function user(){
    	return $this->belongsTo('APISELL\User');
    }
}
