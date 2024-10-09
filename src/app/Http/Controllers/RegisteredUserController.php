<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    //
    public function create(Request $request){
        return view('auth.register');
    }

    public function store(Request $request){
        dd('store endpoint');
    }
}
