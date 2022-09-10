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
    Route::get('/growing', [App\Http\Controllers\GrowingController::class, 'index']);
    Route::get('/growing', [App\Http\Controllers\GrowingRoomController::class, 'index']);
    Route::get('/esa', [App\Http\Controllers\EsaRoomController::class, 'index']);
    Route::get('/asobi', [App\Http\Controllers\AsobiRoomController::class, 'index']);

    Route::get('/growing/furniture_kind_select', [\App\Http\Controllers\FurnitureRoomController::class, 'index']);
    Route::get('/growing/furniture_kind_select/chair', [App\Http\Controllers\ListChairController::class, 'index']);
    Route::get('/growing/furniture_kind_select/desk', [App\Http\Controllers\ListDeskController::class, 'index']);
    Route::get('/growing/furniture_kind_select/floor', [App\Http\Controllers\ListFloorController::class, 'index']);
    Route::get('/growing/furniture_kind_select/wall', [App\Http\Controllers\ListWallController::class, 'index']);
    Route::put('/growing/furniture_kind_select/chair', [App\Http\Controllers\ListChairController::class, 'update']);
    Route::put('/growing/furniture_kind_select/desk', [App\Http\Controllers\ListDeskController::class, 'update']);
    Route::put('/growing/furniture_kind_select/floor', [App\Http\Controllers\ListFloorController::class, 'update']);
    Route::put('/growing/furniture_kind_select/wall', [App\Http\Controllers\ListWallController::class, 'update']);

    Route::get('/manage_item', function () {
        return view('manage_item');
    });
    Route::post('/manage_item',[App\Http\Controllers\ItemStoreController::class,'index']);
    Route::post('/gacha',[App\Http\Controllers\GachaController::class,'gacha']);
});

