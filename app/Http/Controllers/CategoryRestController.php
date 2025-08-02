<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CategoryPostRequest;

class CategoryRestController extends Controller
{
    
    public function index(){
        $categories = Category::all();
        return response()->json($categories,Response::HTTP_OK);
    }
    
    public function store(CategoryPostRequest $request){
        $category=Category::create($request->all());
        return response()->json([
            'message'=>'Record created successfully',
            'category'=>$category
        ],Response::HTTP_CREATED);
    }

    public function update(CategoryPostRequest $request,$category){
        $category=category::find($category);
        $category->update($request->only('name','slug'));
        return response()->json([
            'message'=>'Registration updated successfully',
            'category'=>$category
        ],Response::HTTP_CREATED);

    }

    public function destroy($category){
        $category=category::find($category);
        $category->delete();
        return response()->json([
            'message'=>'Record deleted successfully',
        ],Response::HTTP_OK);        
    }
}
