<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');


//> dashboard
Route::prefix('dashboard')->middleware(['checkGoogleRegister'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

//> dashboard admin
Route::prefix('dashboard/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
});

Route::get('auth/set-password', [AuthController::class, 'setPassword'])->name('login.google.setPassword');
Route::post('auth/set-password', [AuthController::class, 'setPasswordAct'])->name('login.google.setPassword');
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginAct'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerAct'])->name('register');

    Route::get('google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('google/callback', [AuthController::class, 'googleCallback']);
    Route::post('google/validate', [AuthController::class, 'setCredentialAfterLoginGoogle']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotpassword');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('forgetpassword.send');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'editPassword'])->name('edit.password');
    Route::put('reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('update.password');
    Route::get('actived/{token}', [ForgotPasswordController::class, 'activatedMember'])->name('activedMember');

    Route::get('logout', function () {
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->flush();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});
