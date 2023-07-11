<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\Auth\UserAuthController;
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
    return view('welcome');
});

Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('show_login_form');
Route::post('/login', [UserAuthController::class, 'login'])->name('login_action');

Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('show_register_form');
Route::post('/register', [UserAuthController::class, 'register'])->name('register_action');

Route::get('/pastes/create', [PasteController::class, 'create'])->name('pastes.create');
Route::post('/pastes', [PasteController::class, 'store'])->name('pastes.store');
Route::get('/my-awesome-pastebin.tld/{url}', [PasteController::class, 'show'])->name('pastes.show');

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
