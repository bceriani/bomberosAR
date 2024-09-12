<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home');
});

// Route::get('/{any}', function () {
//     return view('app'); // Asegúrate de que esta vista exista y contenga la estructura de tu aplicación Vue
// })->where('any', '.*');


// route::get('/dashboard', fn() => view('home'));

Route::middleware(['guest'])->group(function () {
    
});

Route::middleware(['auth'])->group(function () {

});
