<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


// ショップ一覧ページ
Route::get('/', [ShopController::class, 'index'])->name('index');

// エリアごとの検索結果ページ
Route::get('/shop/area/{id}', [ShopController::class, 'searchArea'])->name('shop.area');

// ジャンルごとの検索結果ページ
Route::get('/shop/genre/{id}', [ShopController::class, 'searchGenre'])->name('shop.genre');
// 飲食店詳細ページ
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::post('/reservation/confirm', [ReservationController::class, 'confirm'])->name('reservation.confirm');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/thanks', [ReservationController::class, 'thanks'])->name('thanks');
    // マイページ
    Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');
});
