<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'toLogin'])->name('login');

Route::get('/register', [AuthController::class, 'toRegister'])->name('register');

Route::post('/toregister', [AuthController::class, 'register'])->name('user.register');

Route::post('/tologin', [AuthController::class, 'login'])->name('user.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forget/password', [AuthController::class, 'showForgotPasswordForm'])->name('forget.password');

Route::post('/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
