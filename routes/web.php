<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Dashboard;

use App\Livewire\CreateVehicle;
use App\Livewire\ViewAnyVehicle;
use App\Livewire\ViewVehicle;
use App\Livewire\EditVehicle;

use App\Livewire\ViewVehicleTransferRequest;


use App\Livewire\UserProfile;
use App\Livewire\InviteUser;


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
    Route::get('register/{userData?}', Register::class)->name('register');
});

Route::middleware([
    'auth'
])->group( function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');



    //Start Vehicle Section


    Route::get('create-vehicle', CreateVehicle::class)->name('create-vehicle');
    Route::get('list-vehicles', ViewAnyVehicle::class)->name('viewAny-vehicle');
    Route::get('vehicle/{id}', ViewVehicle::class)->name('view-vehicle');
    Route::get('vehicle/edit/{id}', EditVehicle::class)->name('edit-vehicle');
    

    Route::get('vehicle/transfer/{id}', ViewVehicleTransferRequest::class)->name('transfer-vehicle');



    //End Vehicle Section


    //Start User Section

    Route::get('user/{id}/profile', UserProfile::class)->name('user-profile');
    Route::get('user/invite', InviteUser::class)->name('invite-user');

    //End User Section


    Route::get('logout', function () {
        \Auth::logout();
        return redirect()->route( 'home' );
    })->name('logout');

});
