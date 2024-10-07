<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Jobs;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello World!']);
});

Route::get('/jobs', function (){

/*    $jobs = Jobs::all();
    dd($jobs->only('id'));
*/
    return view('jobs', [
        'jobs' => Jobs::all()
    ]);
});

Route::get('/jobs/{id}', function ($id){
    $job = Jobs::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});


