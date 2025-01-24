<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        //Validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email' ,'max:254'],
            'password' => ['required', Password::min(3)->numbers()->symbols(), 'confirmed']
        ]);
        
        //Create User
        $user = User::create($validatedAttributes);

        // //For Testing
        // Employer::create([
        //     'name' => fake()->company(),
        //     'user_id' => $user->id
        // ]);

        //Login
        Auth::login($user);
    
        //Redirect
        return redirect('/jobs');
    }
}
