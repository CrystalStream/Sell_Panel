<?php

namespace APISELL\Http\Controllers;

use Illuminate\Http\Request;

use APISELL\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use APISELL\Box;
use APISELL\Waste;

class WasteController extends Controller
{
    public function index(){
    	$boxes = Box::all();
    	$box_list = Box::pluck('name','id');
    	$wastes = Waste::all();
    	return View('app.config-box',compact('boxes','wastes','box_list'));
    }

    public function addWaste(Request $request){
    	$waste = new Waste;
    	$box   = Box::find($request->box_id);    
    	$box->current_money = ($box->current_money-$request->money);    
    	$waste->fill($request->all());
    	$waste->user_id = Auth::user()->id;
    	$waste->save();
    	$box->save();
    	Session::flash('waste','Gasto reportado correctamente');
    	return Redirect::to('config');
    }

    public function getWaste($id){
    	$waste = Waste::find($id);    
    	return response()->json(['waste'=>$waste,'user'=> $waste->user->name]);
    }

    public function updateWaste(Request $request){
    	$waste = Waste::find($request->id_waste);    
    	if($waste->box_id != $request->box_id){
    		$old_box = Box::find($request->old_box);
    		$new_box = Box::find($request->box_id);

    		$waste->box_id = $request->box_id;
    		$old_box->current_money = ($old_box->current_money+$request->waste);
    		$new_box->current_money = ($new_box->current_money-$request->waste);
    		
    		$old_box->save();
    		$new_box->save();
    	}    	
    	$waste->save();    

    	Session::flash('change_waste','Gasto actualizado correctamente');
    	return Redirect::to('config#waste-table');
    }
}