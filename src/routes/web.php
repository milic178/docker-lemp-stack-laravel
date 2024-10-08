<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Jobs;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello World!']);
});

Route::get('/jobs', function () {
// Eager load all data related to employer
    $jobs = Jobs::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'min:5'],
    ]);

    //todo validation
    Jobs::create([
        'title' =>request('title'),
        'salary' =>request('salary'),
        'employer_id' =>1,
    ]);
    return redirect('/jobs');
});
Route::get('/jobs/create', function () {
    //$job = Jobs::find($id);
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Jobs::find($id);
    return view('jobs.show', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});


