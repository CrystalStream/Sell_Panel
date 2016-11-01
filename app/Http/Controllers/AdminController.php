<?php

namespace APISELL\Http\Controllers;

use Illuminate\Http\Request;

use APISELL\Http\Requests;
use APISELL\Roles;
use APISELL\User;
use Hash;
use Session;
use Redirect;

class AdminController extends Controller
{
    //

    public function index(){
    	$roles = Roles::pluck('role','id');
        $users = User::all();
    	return View('admin.index',compact('roles','users'));
    }

    public function register(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        Session::flash('message','Usuario Creado Correctamente');
        return Redirect::to('admin');
    }

    public function removeUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['message'=>'Done']);
    }

    public function saveUser(Request $request, $id){        
        $user = User::find($id);     
        $user->name     = $request->data['name'];
        $user->role_id  = $request->data['role_id'];
        if(isset($request->data['password']) && !empty($request->data['password'])){
            $user->password  = Hash::make($request->data['password']);
        }    
        $user->save();

        return response()->json(['message'=>'Done']);
    }

    public function updateUser($id){
        $user = User::find($id);
        return response()->json($user->toArray());
    }
}
