<?php

use App\Livewire\Roles\RolesIndex;
use App\Livewire\Users\UsersIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Permissions\PermissionsIndex;

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
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/user', UsersIndex::class)->name('users.index');

});


Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/akun', [ProfileController::class, 'edit'])->name('akun.edit');
    // Route::patch('/akun', [ProfileController::class, 'update'])->name('akun.update');
    // Route::delete('/akun', [ProfileController::class, 'destroy'])->name('akun.destroy');

    // Route::get('/profile', ProfileForm::class)->name('profile.form');

    Route::get('/permissions', PermissionsIndex::class)->name('permissions.index');

    Route::get('/roles', RolesIndex::class)->name('roles.index');
    
});