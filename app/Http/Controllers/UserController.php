<?php

namespace App\Http\Controllers;

use App\Http\Resources as Resources;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getCurrentUser(Request $request) 
    {
        $user = $request->user();
        return ['success'=>true, 'data'=> new Resources\UserResource($user)];
    }
    public function getUserItems($id) {
        $user = User::find($id);
        return response()->json([
            'success'=>true,
            'data'=> [
                'user'=> new Resources\UserResource($user),
                'items'=>Resources\ItemResource::collection($user->items)
            ]
        ]);
    }
}
