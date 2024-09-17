<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Emailverifycontroller extends Controller
{
    public function verify_view(){
        return Inertia::render('email/send-verification',[
            'status'=>session('status'),
        ]);
    }
    public function sendverification(Request $request,User $user)
{


    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'Email verification link was sent.');
}
    public function verify(EmailVerificationRequest $request){
         $request->fulfill();

         return redirect()->route('profile.index');
    }
}
