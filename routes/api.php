<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('toregister', [AuthController::class, 'register']);
Route::post('/create/categorie', [CategorieController::class, 'store']);
Route::get('/destroy/categorie/{id}', [CategorieController::class, 'destroy']);
Route::put('/update/categorie/{id}', [CategorieController::class, 'update']);
Route::get('/search', [\App\Http\Controllers\EventController::class, 'search']);
Route::get('/categorie/sort', [\App\Http\Controllers\EventController::class, 'sort']);

