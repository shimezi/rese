<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavouriteController;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\QrCodeController;
use PharIo\Manifest\Email;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
// 検索
Route::get('/shop/search', [ShopController::class, 'search'])->name('shops.search');

// 飲食店詳細ページ
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('detail');


// メール認証のルートを追加
Route::middleware(['auth'])->group(function () {
    Route::post('/reservation/confirm', [ReservationController::class, 'confirm'])->name('reservation.confirm');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservations/{id}', [ReservationController::class, 'show']); //QR
    Route::get('/thanks', [ReservationController::class, 'thanks'])->name('thanks');
    Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');
    Route::post('/favourite', [FavouriteController::class, 'store'])->name('favourite.store');
    Route::delete('/favourite{id}', [FavouriteController::class, 'destroy'])->name('favourite.destroy');
});

// メール認証用のルート
/*
Route::get('email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, '_invoke'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6.1'])->name('verification.resend');
*/