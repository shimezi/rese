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

        // 予約データをビューに渡す
        return view('mypage', ['reservations' => $reservations]);
    }
}
