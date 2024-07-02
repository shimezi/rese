<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with(['area', 'genre'])->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('index', compact('shops', 'areas', 'genres'));
    }

    public function searchArea($id)
    {
        $shops = Shop::where('area_id', $id)->get();
        $selectedArea = Area::findOrFail($id);
        $genres = Genre::all();
        $areas = Area::all();
        return view('index', compact('shops', 'selectedArea', 'genres', 'areas'));
    }

    public function searchGenre($id)
    {
        $shops = Shop::where('genre_id', $id)->get();
        $selectedGenre = Genre::findOrFail($id);
        $genres = Genre::all();
        $areas = Area::all();
        return view('index', compact('shops', 'selectedGenre', 'genres', 'areas'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // キーワードを半角および全角スペースで分割
        $keywords = preg_split('/\s+|　+/', $query);

        // クエリビルダーインスタンスを初期化
        $queryBuilder = Shop::query();

        // 各キーワードに対してAND条件を適用
        foreach ($keywords as $keyword) {
            $queryBuilder->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('area', function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', "%{$keyword}%");
                    })
                    ->orWhereHas('genre', function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', "%{$keyword}%");
                    });
            });
        }

        // クエリを実行して結果を取得
        $shops = $queryBuilder->with(['area', 'genre'])->get();

        $areas = Area::all();
        $genres = Genre::all();

        return view('index', compact('shops', 'areas', 'genres'));
    }

    public function show($id)
    {
        $shop = shop::with(['area', 'genre'])->findOrFail($id);
        $areas = Area::all(); // 追加
        $genres = Genre::all(); // 追加
        return view('detail', compact('shop', 'areas', 'genres')); // 修正箇所: 'shop'
    }
}
