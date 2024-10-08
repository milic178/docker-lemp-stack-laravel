<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['greeting' => 'Hello World!']);
Route::view('/contact', 'contact');

//possible to group routes in controller group (ex: JobsController)
/*Route::controller(JobsController::class)->group(function () {
    Route::get('/jobs','index');
    Route::get('/jobs/create','create');
    Route::get('/jobs/{job}','show');
    Route::post('/jobs','store');
    Route::get('/jobs/{job}/edit','edit');
    Route::patch('/jobs/{job}','update');
    Route::delete('/jobs/{job}','destroy');
});
*/
Route::resource('jobs', JobsController::class);

/* we can also only define needed actions, or just exclude not needed actions
Route::resource('jobs', JobsController::class,[
    'except' => ['index', 'show']
]);
Route::resource('jobs', JobsController::class,[
    'only' => ['edit', 'update', 'destroy']
]);
*/


