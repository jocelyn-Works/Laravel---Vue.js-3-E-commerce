<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function userShow(): object
    {

        return response()->json(User::all());
    }

    public function UserShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

        $userId = User::findOrFail($id)]);

        return response()->json([$userId]);

    }

    public function UpdateUser($id, Request $request)
    {
        $updatecustomer = $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'civility' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'phone_number' => 'nullable'
        ]);

        $user = User::findOrFail($id);
        $user->update($updatecustomer);

        return response()->json($updatecustomer);

    }

    public function PostUser(Request $request)
    {
        try {
            $validate = $request->validate([
                'first_name' => 'required|string|max:20',
                'last_name' => 'required|string|max:20',
                'email' => 'required|string|email|max:70|unique:users',
                'password' => 'required|string',
                'civility' => 'required|string|max:20',
                'adress' => 'required|string|max:60',
                'city' => 'required|string|max:30',
                'phone_number' => 'required|string|max:15',
            ]);


            $postcustomer = new User($validate);
            $postcustomer->save();
            return response()->json($postcustomer);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }



public function DeleteUser(Request $request, $id)
    {
        $deletecustomer = User::findOrFail($id);
        $deletecustomer->delete();
        return response()->json(User::all());
    }


    public function getOrdersByUserId($id) {

        $user = User::with('orders')->findOrFail($id);

        return response()->json($user);
    }
}