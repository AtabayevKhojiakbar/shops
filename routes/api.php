<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('product',\App\Http\Controllers\Api\StoreController::class);
Route::resource('tarix',\App\Http\Controllers\Api\HistoryController::class);
Route::resource('shop',\App\Http\Controllers\Api\ObjectController::class);
Route::resource('user',\App\Http\Controllers\Api\UserController::class);
