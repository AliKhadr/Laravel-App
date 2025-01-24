<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
        // Gate::define('edit-job', function(User $user, Job $job){
        //     return $job->employer->user->is($user);
        // })

        if(Auth::guest()){
            return redirect('/login');
        }

        if($job->employer->user->isNot(Auth::user())){
            abort(403);
        }

        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Job $job) {
        // Authorise (Hold for now)

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
        // Authorise (on Hold)

        // Delete
        $job->delete();

        // Redirect
        return redirect('/jobs');
    }

}
