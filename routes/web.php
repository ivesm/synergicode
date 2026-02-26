<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user');
});

Route::post('/form', [UserController::class, 'store'])->name('user.store');
Route::view('/confirmation', 'confirmation')->name('confirmation.page');
Route::view('/error', 'error')->name('error.page');