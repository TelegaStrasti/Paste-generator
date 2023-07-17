<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'welcome');

Route::prefix('auth')->group(function () {
    Route::get('google', [GoogleAuthController::class, 'redirectToGoogle']);
    Route::get('google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
});

Route::prefix('login')->group(function () {
    Route::get('/', [UserAuthController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('/', [UserAuthController::class, 'login'])->name('login_action');
});

Route::prefix('register')->group(function () {
    Route::get('/', [UserAuthController::class, 'showRegistrationForm'])->name('show_register_form');
    Route::post('/', [UserAuthController::class, 'register'])->name('register_action');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/complaints', [ComplaintController::class, 'makeComplaint'])->name('complaints_make');

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user_index');
    });
});

Route::prefix('pastes')->group(function () {
    Route::get('create', [PasteController::class, 'create'])->name('pastes_create');
    Route::post('/', [PasteController::class, 'store'])->name('pastes_store');
});

Route::get('my-awesome-pastebin.tld/{url}', [PasteController::class, 'show'])->name('pastes_show');

