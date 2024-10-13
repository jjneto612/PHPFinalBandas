<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function showForm(){

        return view("auth.register");
    }

    public function store(){

        $userDetails=request()->validate([

            "name"=>"required|string|max:50",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|min:6",
            'user_type' => 'required|integer|in:1,2,3',
        ]);

        $newUser=User::create($userDetails);

        

        return redirect("/login")->with("message","User adicionado com successo.");

    }

    public function showLoginForm()
{
    return view('auth.login'); // Assuming your login form is stored in 'resources/views/auth/login.blade.php'
}

    public function logIn(Request $request){

        $userCred= $request->validate([

           "email" => "required|email",
           "password" => "required"
        ]);

        if(Auth::attempt($userCred)){

           
            $request->session()->regenerate();

            return redirect()->route("show.dashboard");
        }

            return back()->withErrors([
                'email' => 'User não foi encontrado',
            ])->onlyInput('email');

    }

    public function logOut(){

        Auth::logout();
        return redirect("/home");
    }
}
