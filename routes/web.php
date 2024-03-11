<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\adminCategories;
use App\Http\Middleware\Dashboard;
use App\Http\Middleware\AdminDashboard;

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

Route::get('/blocked', function (){
    return view('blocked');
})->name('blocked');

Route::get('/', [AuthController::class, 'toLogin'])->name('login');
Route::get('/register', [AuthController::class, 'toRegister'])->name('register');
Route::post('/toregister', [AuthController::class, 'register'])->name('user.register');
Route::post('/tologin', [AuthController::class, 'login'])->name('user.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget/password', [AuthController::class, 'showForgotPasswordForm'])->name('forget.password');
Route::post('/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');



Route::middleware([adminCategories::class])->group(function (){
    //Admin categories with create and delete and update and display Categories

    Route::get('/categorie', [CategorieController::class, 'index'])->name('to.add.categorie');
    Route::post('/categories', [CategorieController::class, 'store'])->name('add.categorie');
    Route::get('/categories', [CategorieController::class, 'getCategorie'])->name('get.categorie');
    Route::delete('/destroy/categorie/{id}', [CategorieController::class, 'destroy'])->name('destroy.categorie');
    Route::put('/update/categorie/{id}', [CategorieController::class, 'update'])->name('update.categorie');
});



Route::middleware([\App\Http\Middleware\blocked::class])->group(function (){
    Route::get('/home', [EventController::class, 'getEvents'])->name('home');
    Route::get('/event', [EventController::class, 'index'])->name('to.add.event');
    Route::post('/events', [EventController::class, 'store'])->name('add.event');
    Route::get('/details/{id}', [EventController::class, 'eventDetails'])->name('event.details');
    Route::delete('/destroy/event/{id}', [EventController::class, 'destroy'])->name('delete.event');
    Route::patch('/update/event/{id}', [EventController::class, 'update'])->name('update.event');


    //tickets page
    Route::get('/ticket/{id}', [TicketController::class, 'index'])->name('to.add.ticket');
    Route::post('/tickets', [TicketController::class, 'store'])->name('add.ticket');

    //find events
    Route::get('/find/event', [EventController::class, 'toFindEvent'])->name('to.find.event');
    Route::get('/search', [EventController::class, 'search']);
    Route::get('/categorie/sort', [EventController::class, 'sort']);

    //store reservation
    Route::post('/reserve/{id}', [ReservationController::class, 'store'])->name('reserve');
});




Route::middleware([Dashboard::class])->group(function (){
    //organizer dashboard with accept and refuse reservation

    Route::get('/dashboard', [ReservationController::class, 'index'])->name('dashboard');
    Route::get('/reserve/request', [ReservationController::class, 'reserveRequest'])->name('reserve.request');
    Route::post('/accept/reserve/{id}', [ReservationController::class, 'acceptReserve'])->name('accept.reserve');
    Route::post('/refused/reserve/{id}', [ReservationController::class, 'refuseReserve'])->name('refused.reserve');
});



Route::middleware([AdminDashboard::class])->group(function (){
    //Admin dashboard with accept and refuse events and add block to the users

    Route::get('/admin/dashboard', [EventController::class, 'adminStatistics'])->name('admin.dashboard');
    Route::get('/request/event', [EventController::class, 'requestEvent'])->name('request.event');
    Route::post('/accept/event/{id}', [EventController::class, 'acceptEvent'])->name('accept.event');
    Route::post('/refuse/event/{id}', [EventController::class, 'refuseEvent'])->name('refuse.event');
    Route::get('/block/users', [EventController::class, 'blockUsers'])->name('block.users');
    Route::post('/block/{id}', [EventController::class, 'blockUserAction'])->name('block');
});


