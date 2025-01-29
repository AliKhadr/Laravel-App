<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer', 'tags')->latest()->paginate(4);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function store() {
        request()->validate([
            'Job_Title' => ['required', 'min:3'],
            'Job_Salary' => ['required']
        ]);
    
        Job::create([
            'Job_Title' => request('Job_Title'),
            'Job_Salary' => request('Job_Salary'),
            'employer_id' => 1
            // 'employer_id' => Auth::user()->employer->id
        ]);
    
        return redirect('/jobs');
    }

    public function edit(Job $job) {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Job $job) {
        // Validate
        request()->validate([
            'Job_Title' => ['required', 'min:3'],
            'Job_Salary' => ['required']
        ]);
        
        // Update
        $job->update([
            'Job_Title' => request('Job_Title'),
            'Job_Salary' => request('Job_Salary')
        ]);

        // Redirect
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job) {
        // Delete
        $job->delete();

        // Redirect
        return redirect('/jobs');
    }

}
