<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        // request()->validate([
        //     'first_name' => ['required', 'min:3'],
        //     'last_name' => ['required', 'min:3'],
        //     'email' => ['required', 'min:3'],
        //     'password' => ['required', 'min:3'],
        //     'password_confirmation' => ['required', 'min:3'],
        // ]);
    
        // User::create([
        //     'Job_Title' => request('Job_Title'),
        //     'Job_Salary' => request('Job_Salary'),
        //     'employer_id' => 1
        // ]);
    
        // return redirect('/jobs');

        dd(request()->all());
    }
}
