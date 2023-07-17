<?php

use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\PasteController;
use App\Http\Controllers\Api\Auth\GoogleAuthController;
use App\Http\Controllers\Api\Auth\UserAuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('pastes')->group(function () {
    Route::post('/store', [PasteController::class, 'store']);
});

Route::get('my-awesome-pastebin.tld/{url}', [PasteController::class, 'show']);

Route::prefix('auth')->group(function () {
    Route::get('google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
});

Route::prefix('login')->group(function () {
    Route::get('/', [UserAuthController::class, 'showLoginForm']);
    Route::post('/', [UserAuthController::class, 'login']);
});

Route::prefix('register')->group(function () {
    Route::get('/', [UserAuthController::class, 'showRegistrationForm']);
    Route::post('/', [UserAuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/complaints', [ComplaintController::class, 'makeComplaint']);

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
    });
});
