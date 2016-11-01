<?php

namespace APISELL;

use Illuminate\Database\Eloquent\Model;
use APISELL\User;

class Roles extends Model
{
    protected $fillable = [
        'role',
    ];

    public function users(){
    	return $this->hasMany('APPISELL\User');
    }
}
