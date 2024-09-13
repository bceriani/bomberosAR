<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.login');
});

Route::middleware(['auth'])->group(function () {

    //* -------------- LOGOUT --------------
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //* -------------- HOME --------------
    Route::get('/', function () {
        return view('home');
    });

    //* -------------- USERS --------------
    route::get('/users', [UserController::class, 'index']);


});
