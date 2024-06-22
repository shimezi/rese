<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Shop;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function confirm(Request $request)
    {
        // 予約確認のためのデータを取得
        $data = $request->all();

        // 予約確認のためのデータを取得
        $shop = Shop::find($request->shop_id);

        // 確認ページにデータを渡す
        return view('detail', ['shop' => $shop, 'data' => $data, 'confirm' => true]);
    }

    public function store(ReservationRequest $request)
    {
        // ReservationRequestのバリデーション済みデータの取得
        $validated = $request->validated();

        // 日付と時間を結合してcheck_inフィールドの値を作成
        $check_in = $validated['date'] . ' ' . $validated['time']; // スペースを追加

        // 予約データの保存
        Reservation::create([
            'user_id' => Auth::id(),
            'shop_id' => $validated['shop_id'],
            'check_in' => $check_in,
            'number_of_people' => $validated['number_of_people'],
        ]);

        return redirect()->route('thanks'); // ルート名を指定してリダイレクト
    }

    // thanksページを表示するためのメソッド
    public function thanks()
    {
        return view('thanks');
    }
}
