<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(Request $request){
        return view('auth.login');
    }

    public function store(Request $request){
        dd('post login controller');

    }
}
