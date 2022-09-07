<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::match(['get', 'post'],'/tasks', [App\Http\Controllers\TaskController::class,'index']);
    Route::get('/gacha', [App\Http\Controllers\GachaController::class, 'index'])->name('gacha');
    Route::get('/draw', [App\Http\Controllers\DrawController::class, 'index'])->name('draw');
});


