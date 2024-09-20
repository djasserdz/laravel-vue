<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Email\Emailverifycontroller;
use App\Http\Controllers\oauth\googlecontroller;
use App\Http\Controllers\Password\PasswordResetController;
use App\Http\Controllers\User\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::middleware('guest')->group(function(){
    Route::get('/register',[Authcontroller::class,'create'])->name('view.register');
    Route::get('/login',[Authcontroller::class,'lgn'])->name('view.login');
    Route::post('/register',[Authcontroller::class,'store'])->name('register');
    Route::post('/login',[Authcontroller::class,'login'])->name('login');
    Route::get('/forgot-password',[PasswordResetController::class,'page'])->name('password.request');
    Route::post('/forgot-password',[PasswordResetController::class,'sendrequest'])->name('password.email');
    Route::get('/reset-password',[PasswordResetController::class,'page2'])->name('password.reset');
    Route::post('/reset-password',[PasswordResetController::class,'link'])->name('password.update');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');
    Route::get('/profile',[Usercontroller::class,'index'])->name('profile.index')->middleware('verified');
    Route::put('/profile/update',[Usercontroller::class,'update'])->name('profile.update')->middleware('verified');
    Route::delete('/profile/delete',[Usercontroller::class,'destroy'])->name('profile.delete')->middleware('verified');
    Route::get('/email/verify',[Emailverifycontroller::class,'verify_view'])->name('verification.notice');
    Route::post('/email/verify/send',[Emailverifycontroller::class,'sendverification'])->name('verification.send');
    Route::get('/email/verify/{id}/{hash}',[Emailverifycontroller::class,'verify'])->name('verification.verify');
    Route::inertia('/set-password','Auth/password')->name('view.password');
    Route::post('/set-password',[googlecontroller::class,'password'])->name('password');
});

Route::get('/auth/google/redirect',[googlecontroller::class,'redirect'])->name('redirect');
Route::get('/auth/google/callback',[googlecontroller::class,'callback'])->name('callback');
