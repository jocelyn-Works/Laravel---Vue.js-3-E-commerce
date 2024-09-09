<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserAdminController extends Controller
{
    public function userShow(): object
    {
        $users = User::all();
        return view ('admin.user', compact('users'));
    }


    public function userDelete(Request $request){
        $users = User::findOrFail($request->id);
        $users->delete();
        return $this->userShow()->with('message', 'User supprimé');
    }
    public function userPost(Request $request){
//
    return view ('admin.userPost');
    }
    public function userCreate(Request $request){

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

        $adminPost = new User($request->all());
        $adminPost->save();

       return $this->userShow()->with('message', 'User créer');
    }

    public function userEdit($id){
        $user = User::findOrFail($id);
        return view ('userPatch',compact('user'));
    }


    public function userPut(Request $request, $id){
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

       $users = User::findOrFail($id);
        $users->update($updatecustomer);

        return $this->userShow()->with('message', 'User modifié');
    }
    public function searchUser(Request $request){
        $search = $request->input('search');


        $results = User::where('first_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('civility', 'like', "%$search%")
            ->orWhere('adress', 'like', "%$search%")
            ->orWhere('city', 'like', "%$search%")->get();

        return $this->userShow()->with('results', $results);
    }

}
