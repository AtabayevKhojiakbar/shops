<?php

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


Route::get('/', [\App\Http\Controllers\HistoryController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::resource('history',\App\Http\Controllers\HistoryController::class);
Route::resource('shop',\App\Http\Controllers\ObjectController::class);
Route::resource('products',\App\Http\Controllers\ProductController::class);
Route::resource('users',\App\Http\Controllers\UserController::class);
Route::get('/amallar',[\App\Http\Controllers\AmalController::class,'index'])->name('amallar.index');

Route::post('/addproduct',[\App\Http\Controllers\AmalController::class,'addProduct'])->name('addproduct');

require __DIR__.'/auth.php';
