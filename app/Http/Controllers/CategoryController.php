<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources as Resources;;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'data' => Resources\CategoryResource::collection($categories)
        ]);
    }

    public function itemsInCategory($id)
    {
        $category = Category::find($id);
    
        if (!$category) {
            return response()->json([
                'success' => false,
                'data' => 'Category not found'
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => [
                'category'=> new Resources\CategoryResource($category), 
                'items'=>Resources\ItemResource::collection($category->items)
            ]
            
        ]);
    }
    
}
