<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function store(Request $request)
    {
        // 新しいFavouriteインスタンスを作成
        $favourite = new Favourite();
        $favourite->user_id = Auth::id(); // 現在認証されているユーザーのIDを設定
        $favourite->shop_id = $request->shop_id; // リクエストされた店舗IDを設定
        $favourite->save(); // データベースに保存

        return redirect()->back()->with('success', 'お気に入りに追加しました。');
    }

    public function destroy($id)
    {
        $favourite = Favourite::where('user_id', Auth::id())->where('shop_id', $id)->first();

        if ($favourite) {
            $favourite->delete();
            return redirect()->back()->with('success', 'お気に入りを削除しました。');
        }

        return redirect()->back()->with('error', 'お気に入りが見つかりません。');
    }
}
