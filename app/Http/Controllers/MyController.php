<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class MyController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    public function relatedItems($id)
    {
        $category = Category::findOrFail($id);
        $items = $category->items;
        return response()->json($items);
    }
}
