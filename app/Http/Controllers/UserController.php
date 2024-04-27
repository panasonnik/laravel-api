<?php

namespace App\Http\Controllers;

use App\Http\Resources as Resources;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCurrentUser(Request $request) 
    {
        $user = $request->user();
        return ['success'=>true, 'data'=> new Resources\UserResource($user)];
    }
    public function getUserItems(Request $request) {
        $items = $request->user()->items;
        return response()->json([
            'success'=>true,
            'data'=> Resources\ItemResource::collection($items)
        ]);
    }
}
