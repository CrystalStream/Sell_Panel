<?php

namespace APISELL\Http\Controllers;

use Illuminate\Http\Request;

use APISELL\Http\Requests;

use APISELL\Category;

class CategoryController extends Controller
{
    public function listing(){
        $categories = Category::All();
        return response()->json($categories->toArray());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $category           = new Category;
        $category->name     = $request->name;
        $category->save();
        return response()->json(['message' => 'Peticion correcta']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category->toArray());
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
        $category       = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return response()->json(['message' => 'Peticion correcta']);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {               
        $category = Category::find($id);       
        if( count($category->products)){
            return response()->json(['message'=>'Has']);
        }else{
            $category->delete();
            return response()->json(['message' => 'Peticion correcta']);   
        }            
    }    
}
