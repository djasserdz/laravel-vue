<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Authcontroller extends Controller
{

    public function create(){
          return Inertia::render('Auth/register');
    }

    public function lgn(){
        return inertia::render('Auth/login');
    }
    public function store(Request $request,User $user){
        sleep(1);

        $fields=$request->validate([
            'username'=>['required','min:5'],
            'email'=>['required','email'],
            'password'=>['required','confirmed'],
         ]);
         $user=User::create($fields);

         Auth::login($user);

         event(new Registered($user));

         return redirect()->route('verification.notice');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$request->filled('remember'))){
            return redirect()->route('profile.index');
        }
        else{
            return back()->withErrors([
                'false'=>'not true',
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }
}
