<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Dashboard;

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
})->name('home');

Route::middleware([
    'unauth'
])->group( function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware([
    'auth'
])->group( function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('user-profile/{id}', function () {
        \Auth::logout();
        return view( 'welcome' );
    })->name('user-profile');

    Route::post('logout', function () {
        \Auth::logout();
        return redirect()->route( 'home' );
    })->name('logout');

});
