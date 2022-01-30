<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('api-login');
    Route::post('/register', [RegisterController::class, 'register'])->name('api-register');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('api-reset-password');

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});
