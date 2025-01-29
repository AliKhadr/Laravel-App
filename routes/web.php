<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'home', ['greeting' => 'Hello User']);
Route::get('/', function () {
    $greeting = Auth::check() ? 'Hello ' . Auth::user()->first_name : 'Hello User';
    return view('home', ['greeting' => $greeting]);
});
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class)->middleware('auth');
// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

Route::controller(JobController::class)->group(function(): void{
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store')->middleware('auth');
    Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit', 'job');
    Route::patch('/jobs/{job}', 'update')->middleware('auth')->can('edit', 'job');
    Route::delete('/jobs/{job}', 'destroy')->middleware('auth')->can('edit', 'job');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);