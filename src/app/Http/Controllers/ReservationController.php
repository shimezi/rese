<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Shop;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function confirm(Request $request)
    {
        Log::info('Confirm method called');
        // 予約確認のためのデータを取得
        $data = $request->all();
        Log::info('Data received: ', $data);

        // 予約確認のためのデータを取得
        $shop = Shop::find($request->shop_id);
        if (!$shop) {
            Log::error('Shop not found: ', ['shop_id' => $request->shop_id]);
            return redirect()->back()->withErrors(['shop_id' => '指定されたショップが存在しません。']);
        }
        // 確認ページにデータを渡す
        return view('detail', ['shop' => $shop, 'data' => $data, 'confirm' => true]);
    }

    public function store(ReservationRequest $request)
    {
        // デバッグログを追加
        log::info('Store method called.');

        // ReservationRequestのバリデーション済みデータの取得
        $validated = $request->validated();
        log::info('validated data: ', $validated);

        // 日付と時間を結合してcheck_inフィールドの値を作成
        $check_in = $validated['date'] . ' ' . $validated['time'];
        log::info('check-in time: ' . $check_in);

        // 予約データの保存
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'shop_id' => $validated['shop_id'],
            'check_in' => $check_in,
            'number_of_people' => $validated['number_of_people'],
        ]);

        log::info('Reservation created: ', $reservation->toArray());

        return redirect()->route('thanks');
    }

    // thanksページを表示するためのメソッド
    public function thanks()
    {
        log::info('Thanks method called.');
        return view('thanks');
    }
}
