<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth as AuthRequests;

class AuthController extends Controller
{
    public function register(Request $request) 
    {
       $isUserExists = User::where('email',$request->email)->exists();

       if($isUserExists) {
        return response()->json([
            'success'=>false,
            'data'=>'User with email already exists'
        ], 400);
       }
       $user = User::create([
        'name'=> $request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'email_verified_at'=>now()
       ]);
       //dd($user);
       $token = $user->createToken('default')->plainTextToken;
       return response()->json([
        'success'=>true,
        'data'=> [
            'token'=>$token
        ]
        ]);
    }

    public function login(Request $request) {
        $user=User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json([
                'success'=>false,
                'data'=>'User does not exist'
            ], 400);
        }
        if(Hash::check($request->password, $user->password)) {
            return response()->json([
                'success'=>false,
                'data'=>'Passwords do not match'
            ], 400);
        }
        $token = $user->createToken('default')->plainTextToken;
       return response()->json([
        'success'=>true,
        'data'=> [
            'token'=>$token
        ]
        ]);

    }
}

