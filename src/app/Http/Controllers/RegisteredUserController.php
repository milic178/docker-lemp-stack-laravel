<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    //
    public function create(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validate form
        $attributes = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create($attributes);
        Auth::login($user);

        return redirect('/jobs');
    }
}
