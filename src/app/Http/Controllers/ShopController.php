<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = shop::with(['area', 'genre'])->get(); // 全てのショップを取得
        return view('index', compact('shops')); // 'shops'変数をビューに渡す
    }

    public function show($id)
    {
        $shop = shop::with(['area', 'genre'])->findOrFail($id);
        return view('detail', compact('shop'));
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
