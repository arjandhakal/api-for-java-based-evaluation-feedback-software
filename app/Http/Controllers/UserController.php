<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    
    {

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response('Success',201);
        
    }
}
