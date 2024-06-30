<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Shop;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\Image\PngImageBackEnd;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\ImageBackEndInterface;
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

    public function cancel($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($reservation) {
            $reservation->delete();
            return redirect()->route('thanks')->with('success', '予約をキャンセルしました。');
        }

        return redirect()->route('thanks')->with('error', '予約のキャンセルに失敗しました。');
    }

    public function thanks()
    {
        return view('thanks');
    }

    /*public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        // サンプルデータを使用してQRコードを生成
        $data = "This is a sample QR code.";

        // レンダラーの設定
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        // QRコードの生成
        $writer = new Writer($renderer);
        $outputImage = $writer->writeString($data);

        // QRコードをbase64エンコードしてビューに渡す
        $qrCode = base64_encode($outputImage);

        // デバッグ
        if ($qrCode) {
            \Log::info('QRコード生成成功');
        } else {
            \Log::error('QRコード生成失敗');
        }

        // 予約データとQRコードをビューに渡す
        return view('mypage', ['reservation' => $reservation, 'qrCode' => $qrCode]);
    }*/


    public function showSample()
    {
        \Log::info('QrCodeController@showSample called'); // メソッドが呼ばれたことをログに記録

        // サンプルデータを設定
        $data = "This is a sample QR code.";

        // レンダラーの設定
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        // QRコードの生成
        $writer = new Writer($renderer);
        $outputImage = $writer->writeString($data);

        // QRコードをbase64エンコードしてビューに渡す
        $qrCode = base64_encode($outputImage);

        // デバッグ
        if ($qrCode) {
            \Log::info('QRコード生成成功');
        } else {
            \Log::error('QRコード生成失敗');
        }

        // QRコードをビューに渡す
        return view('mypage', ['qrCode' => $qrCode]);
    }
}
