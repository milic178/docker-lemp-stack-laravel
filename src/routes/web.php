<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['greeting' => 'Hello World!']);
Route::view('/contact', 'contact');

//possible to group routes in controller group (ex: JobsController)
Route::controller(JobsController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create')
    ->middleware('auth');

    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store')->middleware('auth');
    //need to be signed in and need permission to edit the job
    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware(['auth', 'can:edit,job']);
    //same as above, different approach, defines that we are using can methods
    //Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit-job','job');

    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('edit','job');

    Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')
        ->can('edit','job');
});

//Route::resource('jobs', JobsController::class);

/* we can also only define needed actions, or just exclude not needed actions
Route::resource('jobs', JobsController::class,[
    'except' => ['index', 'show']
]);
Route::resource('jobs', JobsController::class,[
    'only' => ['edit', 'update', 'destroy']
]);
*/

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

