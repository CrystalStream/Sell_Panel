<?php

namespace APISELL\Http\Controllers;

use Illuminate\Http\Request;

use APISELL\Http\Requests;

use APISELL\Product;

use APISELL\Roles;

class AppController extends Controller
{
    public function sell(){
    	return View('app.sell-panel');
    }

    public function admin(){
    	return View('app.config');
    } 
}
