<?php

namespace App\Http\Controllers\oauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class googlecontroller extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        $google_user=Socialite::driver('google')->stateless()->user();

        dd($google_user);
    }
}
