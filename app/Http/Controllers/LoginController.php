<?php

namespace APISELL\Http\Controllers;

use Illuminate\Http\Request;

use APISELL\Http\Requests;

use APISELL\User;

use Session;
use Redirect;
use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except'=>'logout']);
    }

    public function index(){
    	return View('login');
    }

    public function login(Request $request){       
    	if (Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $user = User::where('name','=',$request->name)->get()->first();            
            if($user->role_id == '1'){
                return Redirect::to('admin');
            }else{
                return Redirect::to('articles');
            }
    	}
    	Session::flash('message','Usuario o Contraseña incorrectos, intentalo de nuevo');
    	return View('login');
    }
    public function logout(){
    	Auth::logout();    
        return Redirect::to('/');
    }
    
}
