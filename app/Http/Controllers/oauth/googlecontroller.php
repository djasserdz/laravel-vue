<?php

namespace App\Http\Controllers\oauth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class googlecontroller extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback()
{
    $google_user = Socialite::driver('google')->stateless()->user();


    $existingUser = User::where('email', $google_user->email)->first();

    if ($existingUser) {

        Auth::login($existingUser);
        return redirect()->route('profile.index');
    } else {

        $newUser = User::create([
            'username' => $google_user->name,
            'email' => $google_user->email,
        ]);


        $newUser->google()->create([
            'google_id' => $google_user->id,
            'google_token' => $google_user->token,
        ]);

        // Log in the new user
        Auth::login($newUser);

        $newUser->sendEmailVerificationNotification();

        return redirect()->route('view.password');
    }
}

public function password(Request $request,User $user){

    $user=auth()->user();


    $request->validate([
        'password'=>['required','confirmed']
    ]);

    $user->update([
        'password'=>$request->input('password'),
    ]);

    return redirect()->route('verification.notice');

}



}

