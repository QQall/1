<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;

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



Auth::routes();

//роуты авторизации стим
Route::get('/auth/steam', [AuthController::class, 'redirectToSteam']);
Route::get('/auth/steam/callback', [AuthController::class, 'handleSteamCallback']);


Route::get("{page}", [AppController::class, 'App'])->where('page',".*");



