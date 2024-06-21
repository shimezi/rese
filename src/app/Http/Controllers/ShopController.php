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
        $area = Area::findOrFail($id);
        $shops = Shop::where('area_id', $id)->with(['area', 'genre'])->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('index', compact('shops', 'areas', 'areas', 'genres')); // 修正
    }

    public function searchGenre($id)
    {
        $genre = Genre::findOrFail($id);
        $shops = Shop::where('genre_id', $id)->with(['area', 'genre'])->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('index', compact('shops', 'genre', 'areas', 'genres')); // 修正
    }

    public function show($id)
    {
        $shop = shop::with(['area', 'genre'])->findOrFail($id);
        $areas = Area::all(); // 追加
        $genres = Genre::all(); // 追加
        return view('detail', compact('shop', 'areas', 'genres')); // 修正箇所: 'shop'
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function done()
    {
        return view('done');
    }

    public function mypage()
    {
        return view('mypage');
    }
}
