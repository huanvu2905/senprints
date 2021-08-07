<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(User $user, Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if ($user->update($data)) {
            return response()
            ->json([
                'data' => [                    
                    'message' => 'success',
                    'status' => 200,
                ]
            ], 200);
        } else {
            return response()
            ->json([
                'data' => [                    
                    'message' => 'fail',
                    'status' => 204,
                ]
            ], 200);
        }

    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}