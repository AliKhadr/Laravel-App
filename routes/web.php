<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello User'
    ]);
});

// Index
Route::get('/jobs', function(){
    $jobs = Job::with('employer', 'tags')->latest()->paginate(4);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function(){
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function($id){
    $job = Job::findOrFail($id);
    return view('jobs.show', [
        'job' => $job
    ]);
});

// Store
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

// Edit
Route::get('/jobs/{id}/edit', function($id){
    $job = Job::findOrFail($id);
    return view('jobs.edit', [
        'job' => $job
    ]);
});

// Update
Route::patch('/jobs/{id}', function($id){
    // Validate
    request()->validate([
        'Job_Title' => ['required', 'min:3'],
        'Job_Salary' => ['required']
    ]);

    // Authorise (Hold for now)

    // Update
    $job = Job::findOrFail($id);

    $job->update([
        'Job_Title' => request('Job_Title'),
        'Job_Salary' => request('Job_Salary')
    ]);

    // Redirect
    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function($id){
    // Authorise (on Hold)

    // Delete
    $job = Job::findOrFail($id);
    $job->delete();

    // Redirect
    return redirect('/jobs');
});


Route::get('/contact', function(){
    return view('contact');
});