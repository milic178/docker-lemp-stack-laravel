<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Jobs;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello World!']);
});

//index
Route::get('/jobs', function () {
// Eager load all data related to employer
    $jobs = Jobs::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//Store job
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

//Create job
Route::get('/jobs/create', function () {
    //$job = Jobs::find($id);
    return view('jobs.create');
});
//Show job
Route::get('/jobs/{job}', function (Jobs $job) {
    return view('jobs.show', ['job' => $job]);
});

//Edit job
Route::get('/jobs/{job}/edit', function (Jobs $job) {
    return view('jobs.edit', ['job' => $job]);
});
//Update job
Route::patch('/jobs/{job}', function (Jobs $job) {
    //validate request
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'min:5'],
    ]);

    //todo authorize request (on hold)
    //update the job
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect('/jobs/'.$job->id);
});
//Destroy job
Route::delete('/jobs/{job}', function (Jobs $job) {
    //todo authorize request (on hold)
    $job->delete();
    return redirect('/jobs');
});


//Contact
Route::get('/contact', function () {
    return view('contact');
});


