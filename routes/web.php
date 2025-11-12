<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\EditKaryawan;
use App\Livewire\Admin\FormBudgetMaster;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\Karyawan\Dashboard;
use App\Livewire\Karyawan\FormTransaksi;
use App\Livewire\Karyawan\Transaksi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

// karyawan routes
Route::prefix('karyawan')->middleware(['auth','role:karyawan'])
->group( function(){
    Route::view('/dashboard', 'pages/karyawan/dashboard')->name('dashboard');
    Route::view('/transaksi','pages/karyawan/transaksi' )->name('transaksi');
    Route::view('/transaksi/create', 'pages/karyawan/form-transaksi')->name('transaksi.create');
});
// testing account
// email:jawz08@example.com
// password:12345678


// admin routes
Route::prefix('admin')->middleware(['auth','role:admin'])
->group( function(){    
    Route::view('/dashboard', 'pages/admin/dashboardadmin')->name('dashboardadmin');
    Route::view('/transaksi', 'pages/admin/transaksi')->name('transaksiadmin');
    Route::view('/karyawan', 'pages/admin/karyawanlist')->name('admin.karyawan');
    Route::view('/karyawan/tambah', 'pages/admin/tambahkaryawan')->name('admin.tambahkaryawan');
    Route::get('/karyawan/edit/{id}', function ($id) {
        return view('pages.admin.editkaryawan', compact('id'));
    })->name('admin.editkaryawan');
    Route::view('/budget', 'pages/admin/budget')->name('admin.budget');
    Route::view('/budget/edit/{id}', 'pages/admin/editbudget')->name('admin.editbudget');
    Route::view('/budget/tambah', 'pages/admin/formbudget')->name('admin.tambahbudget');
    Route::get('/budget/anggaran', FormBudgetMaster::class)->name('admin.budget_master');
});
// testing account
// email:rian@example.com
// password:rian180707
    

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
