<?php

use App\Livewire\Roles\RolesIndex;
use App\Livewire\Users\UsersIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Devices\DevicesIndex;
use App\Livewire\Contacts\ContactsIndex;
use App\Livewire\Dashboards\DashboardsIndex;
use App\Livewire\Permissions\PermissionsIndex;
use App\Livewire\LabelKontaks\LabelKontaksIndex;
use App\Http\Controllers\Dashboard\ImportController;

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

    Route::get('/dashboard', DashboardsIndex::class)->name('dashboard');
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

    Route::get('/contacts', ContactsIndex::class)->name('contacts.index');

    Route::post('/contacts-import', [ImportController::class, 'importContact'])->name('contacts.import');

    Route::get('/label-kontaks', LabelKontaksIndex::class)->name('label.index');

    Route::get('/devices', DevicesIndex::class)->name('devices.index');
    
});