<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'login' => $request['login'],
            'role_id' => $request['role_id']
        ]);

        return response()->json([
			'status' => 'Success',
			'message' => 'User created',
            'data' => ['token' => $user->createToken('API Token')->plainTextToken]
		], 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->toArray())) {
            return response()->json([
                'status' => 'Not logged',
                'message' => 'Wrong login or/and password'
            ], 401);
        }

        return response()->json([
			'status' => 'Success',
			'message' => 'Logged in',
			'data' => ['token' => auth()->user()->createToken('API Token')->plainTextToken]
		], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();
    }

    public function update(Request $request)
    {
        if($request->has('id'))
        {
            return response()->json([
                'status' => 'Not updated',
                'message' => 'Can\'t update id'
            ], 401);
        }

        if($request->has('password'))
        {
            return response()->json([
                'status' => 'Not updated',
                'message' => 'can\'t update the user password with this route'
            ], 401);
        }

        $user = auth()->user();
        $user->login = $request['login'];
        $user->email = $request['email'];
        $user->last_name = $request['last_name'];
        $user->first_name = $request['first_name'];
        $user->role_id = $request['role_id'];
        $user->update();

        return response()->json([
                'status' => 'Success',
                'message' => 'User updated'
            ], 200);
    }

    public function updatePassword(Request $request) 
    {
        $user = auth()->user();
        $user->password = bcrypt($request['password']);
        $user->update();

        return response()->json([
			'status' => 'Success',
			'message' => 'User password updated',
		], 200);
    }

    public function show(Request $request)
    {
        return auth()->user();
    }
}
