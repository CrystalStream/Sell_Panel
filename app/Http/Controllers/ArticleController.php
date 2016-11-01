<?php

namespace APISELL\Http\Controllers;

use Illuminate\Http\Request;

use APISELL\Http\Requests;

use Illuminate\Support\Facades\File;

use APISELL\Product;
use APISELL\Category;
use Session;
use Redirect;


class ArticleController extends Controller
{

    public function search(Request $request){
        $product = Product::where('name', $request->param)
                 ->orWhere('name','like','%'.$request->param.'%')->get();        
        return View('app.search',compact('product'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
        $product = Product::Paginate(20);
        $products = Product::all();
        return View('app.index',compact('product','products'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if($request->file('file') !== null){
            $path = $request->file('file')->store('img'); 
        }else{
            $path = null;
        }         
        $product              = New Product;
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->category_id = $request->category_id;
        if( $request->numbers ){
            $sizes = implode(",", $request->numbers);    
            $product->numbers = $sizes;
        }   
        $product->photo_url   = $path;
        $product->save();
        Session::flash('message','Articulo agregado Correctamente');
        return Redirect::to('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    = Product::find($id);
        $categories = Category::pluck('name','id');
        return View('app.edit-article',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $product = Product::find($id);
        $product->name  = $request->name;
        $product->price = $request->price;
        if($product->category_id != $request->category_id){           
            $product->category_id = $request->category_id;
            if( $request->numbers ){
                $product->numbers = implode(",", $request->numbers);                 
            }else{
                $product->numbers = $request->numbers;
            }
        }
        if( $request->numbers ){
            $sizes = implode(",", $request->numbers);    
            $product->numbers = $sizes;
        }

        if( $request->file('file') ){
            $path = $request->file('file')->store('img');
            if($product->photo_url){              
                File::delete($product->photo_url);
                $product->photo_url = $path;
            }else{                
                $product->photo_url = $path;
            }      
        }
        $product->save();        
        return Redirect::to('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->photo_url){
            File::delete($product->photo_url);        
        }
        $product->delete();
        return Redirect::to('articles');
    }
}
