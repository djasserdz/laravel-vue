<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('users/profile',[
            'true'=>session('updated'),
            'user'=>$request->user(),
        ]);
    }
    public function update(Request $request, User $user)
    {
        $user=auth()->user();

       $request->validate([
        'username'=>['required'],
        'email'=>['required']
       ]);
       $user->update([
        'username'=>$request->input('username'),
        'email'=>$request->input('email'),
       ]);


        return back()->with('updated','information updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,Request $request)
    {
        $user=auth()->user();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }
}
