<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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


// ホームページ
Route::get('/', [ShopController::class, 'index'])->name('index');
// Thanksページ
Route::get('/thanks', [ShopController::class, 'thanks'])->name('thanks');
// 予約完了ページ
Route::get('/done', [ShopController::class, 'done'])->name('dome');
// マイページ
Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');

Route::middleware('auth')->group(function () {
});
