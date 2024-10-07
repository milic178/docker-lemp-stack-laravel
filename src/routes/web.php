<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Jobs;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello World!']);
});

Route::get('/jobs', function (){
// Eager load all data related to employer
$jobs = Jobs::with('employer')->simplePaginate(3);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id){
    $job = Jobs::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});


