<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCurrentUser(Request $request) 
    {
        $user = $request->user();
        return response()->json([
            'success'=>true,
            'data'=>$user
        ]);
    }
    public function getUserItems(Request $request) {
        $items = $request->user()->items;
        return response()->json([
            'success'=>true,
            'data'=>$items
        ]);
    }
}
