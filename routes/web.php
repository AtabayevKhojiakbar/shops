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
Route::get('/amallar/kochirish',[\App\Http\Controllers\AmalController::class,'kochirish'])->name('amallar.kochirish');
Route::get('/amallar/sotibolish',[\App\Http\Controllers\AmalController::class,'sotib_olish'])->name('amallar.sotib_olish');
Route::get('/amallar/sotish',[\App\Http\Controllers\AmalController::class,'sotish'])->name('amallar.sotish');
Route::get('/hisobot',[\App\Http\Controllers\HisobotController::class,'index'])->name('hisobot');
Route::post('/addproduct',[\App\Http\Controllers\AmalController::class,'addProduct'])->name('addproduct');
Route::post('/sellproduct',[\App\Http\Controllers\AmalController::class,'sellProduct'])->name('sellproduct');
Route::post('/moveproduct',[\App\Http\Controllers\AmalController::class,'moveProduct'])->name('moveproduct');
Route::post('/delete/{id}',[\App\Http\Controllers\AmalController::class,'delete'])->name('historydelete');
Route::post('/pdelete/{id}',[\App\Http\Controllers\AmalController::class,'deleteProduct'])->name('productdelete');
Route::resource('modal',\App\Http\Controllers\ModalController::class);
require __DIR__.'/auth.php';
