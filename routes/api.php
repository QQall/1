<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;


use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;

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


//users block
Route::get('/user-list', [UsersController::class, 'getList']);
Route::get('/user-count', [UsersController::class, 'getUserCoun']);
Route::patch('/edit-user', [UsersController::class, 'edit']);

// server block
Route::get('/server-list', [ServerController::class, 'getList']);
Route::post('/create-server', [ServerController::class, 'create']);
Route::patch('/edit-server', [ServerController::class, 'edit']);
Route::delete('/delete-server/{id}', [ServerController::class, 'delete']);

//product block
Route::middleware('auth:sanctum')->get('/product-list', [ProductController::class, 'getList']);
Route::middleware('auth:sanctum')->get('/product-count', [ProductController::class, 'getProductCoun']);
Route::middleware('auth:sanctum')->post('/create-product', [ProductController::class, 'create']);
Route::middleware('auth:sanctum')->patch('/edit-product', [ProductController::class, 'edit']);
Route::middleware('auth:sanctum')->delete('/delete-product/{id}', [ProductController::class, 'delete']);


//хз че делаю, но я так понял авторизуюсь в санктум отдаю авторизованого юзера.
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::user();
});