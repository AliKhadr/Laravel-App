<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello User'
    ]);
});

Route::get('/jobs/create', function(){
    return view('jobs.create');
});

Route::get('/jobs', function(){
    $jobs = Job::with('employer', 'tags')->latest()->paginate(4);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function($id){
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job
    ]);
});

Route::post('/jobs', function(){
    request()->validate([
        'Job_Title' => ['required', 'min:3'],
        'Job_Salary' => ['required']
    ]);

    Job::create([
        'Job_Title' => request('Job_Title'),
        'Job_Salary' => request('Job_Salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function(){
    return view('contact');
});