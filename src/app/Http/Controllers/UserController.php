<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        // ログインユーザーの予約データを取得
        $reservations = Reservation::where('user_id', Auth::id())->get();

        // 現在認証されているユーザーを取得
        $user = Auth::user();

        // ユーザーのお気に入り店舗のリストを取得
        $favourites = $user->favourites()->with('shop')->get();

        // 予約データとお気に入りデータをビューに渡す
        return view('mypage', compact('user', 'reservations', 'favourites'));
    }
}
