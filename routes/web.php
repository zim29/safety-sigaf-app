<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;
use App\Livewire\Register;

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
    return view('welcome');
});

Route::middleware([
    'unauth'
])->group( function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware([
    'auth'
])->group( function () {
    Route::get('dashboard', function () {     
        return view( 'welcome' );
    })->name('dashboard');

    Route::get('logout', function () {
        \Auth::logout();
        return view( 'welcome' );
    });
});
