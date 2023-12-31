<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Livewire\Homepage\ListTournaments;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\TournamentRegistrationController;

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
Route::get('/tournament', ListTournaments::class)->name('home.tournaments.index');
Route::get('/tournament/{slug}', [HomeController::class, 'detailTournament'])->name('home.tournaments.show');


//> dashboard member
Route::prefix('dashboard')->middleware(['checkGoogleRegister', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('member-tournaments', TournamentRegistrationController::class)->only('index', 'show');

    //> registrasi turnamen
    Route::get('/registrasi-tournamen/{slug}', [DashboardController::class, 'registration'])->name('tournament.registration');
    Route::post('/registrasi-tournamen/{slug}', [DashboardController::class, 'registrationAct '])->name('tournament.registration');
});

//> dashboard admin
Route::prefix('dashboard/admin')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'indexAdmin'])->name('dashboard.index.admin');
    Route::get('/register-tournament', [DashboardController::class, 'registerTournament'])->name('dashboard.register-tournament.admin');
    Route::get('/members', [MemberController::class, 'index'])->name('member.index');
    Route::get('/members/{id}', [MemberController::class, 'show'])->name('member.show');

    Route::resource('tournament', TournamentController::class);
    Route::get('tournament/setStatus/{id}', [TournamentController::class, 'setStatus'])->name('tournament.setActive');

    Route::resource('admin', AdminController::class);
    Route::get('admin/setStatus/{id}', [AdminController::class, 'setStatus'])->name('admin.setActive');
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

Route::prefix('auth/admin')->group(function () {
    Route::get('login', [AuthController::class, 'loginAdmin'])->name('login.admin');
    Route::post('login', [AuthController::class, 'loginAdminAct'])->name('login.admin');
    Route::get('logout', function () {
        Auth()->guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->flush();
        request()->session()->regenerateToken();
        return redirect()->route('login.admin');
    })->name('logout.admin');
});
