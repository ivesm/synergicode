<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Landing page 
Route::get('/', function () {
    return view('user');
});

//Submission
Route::post('/form', [UserController::class, 'store'])->name('user.store');

//Confirmation page 
Route::view('/confirmation', 'confirmation')->name('confirmation.page');

//Error page 
Route::view('/error', 'error')->name('error.page');