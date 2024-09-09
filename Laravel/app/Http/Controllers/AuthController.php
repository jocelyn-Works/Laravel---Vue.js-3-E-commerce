<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
                        'first_name' => 'required',
                        'email' => 'required',
                        'password' => 'required',
        ]);

        $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $request->input('last_name'),
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'civility' => $request->input('civility'),
                'adress' => $request->input('adress'),
                'city' => $request->input('city'),
                'phone_number' => $request->input('phone_number'),
                'is_admin' => $request->input('is_admin'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                    $user,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    $user,
        ]);
    }

    public function actualUser(Request $request)
    {
       return $request->user();
    }

    public function adminRegister(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $request->input('last_name'),
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'civility' => $request->input('civility'),
            'adress' => $request->input('adress'),
            'city' => $request->input('city'),
            'phone_number' => $request->input('phone_number'),
            'is_admin' => $request->input('is_admin'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
        ]);
    }
}
