<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello User'
    ]);
});

Route::get('/jobs', function(){
    $jobs = Job::with('employer', 'tags')->get();
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function($id){
    return view('job', [
        'job' => Job::find($id)
    ]);
});

Route::get('/contact', function(){
    return view('contact');
});