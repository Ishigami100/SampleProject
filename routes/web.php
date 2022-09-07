<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GrowingController;
use App\Http\Controllers\GachaController;

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

Route::group(['middleware'=>'verified'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/tasks', TaskController::class);
    Route::get('/gacha', [App\Http\Controllers\GachaController::class, 'index'])->name('gacha');
    Route::get('/draw', [App\Http\Controllers\DrawController::class, 'index'])->name('draw');
    Route::get('/growing',[App\Http\Controllers\GrowingController::class, 'index']);
    Route::get('/growing/furniture_kind_select', function () {
        return view('growing.furniture_kind_select');
    });
    Route::get('/growing/furniture_kind_select/chair', function () {
        return view('growing.chair');
    });
    Route::get('/growing/furniture_kind_select/desk', function () {
        return view('growing.desk');
    });
    Route::get('/growing/furniture_kind_select/wall', function () {
        return view('growing.wall');
    });
    Route::get('/growing/furniture_kind_select/floor', function () {
        return view('growing.floor');
    });
    Route::get('/manage_item', function () {
        return view('manage_item');
    });
    Route::post('/manage_item',[App\Http\Controllers\ItemStoreController::class,'index']);
    Route::post('/gacha',[App\Http\Controllers\GachaController::class,'gacha']);
});

