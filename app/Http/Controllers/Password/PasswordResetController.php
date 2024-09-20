<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function page(){
        return Inertia::render('Password/password',[
            'status'=>session('status'),
            'email'=>session('email'),
        ]);
    }






    public function sendrequest(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status',__($status))
                    : back()->with('email',__($status));
    }















    public function page2(Request $request){
        return Inertia::render('Password/updatepassword',[
                'email'=>session('email'),
                'request'=>$request->token,
                'status'=>session('status'),
        ]);
    }
















    public function link(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('view.login')->with('status', __($status))
                    : back()->with('email',__($status));
    }
}
