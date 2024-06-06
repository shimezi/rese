@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="shop-detail-container">
        <div class="shop-detail-content">
            <p class="shop-description">{{ $shop->description }}</p>
            <h1 class="shop-name">{{ $shop->name }}</h1>
            <!-- 画像の表示 -->
            <img class="shop-image" src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
            <!-- ハッシュタグの表示 -->
            <div class="shop-tags">
                <span class="shop-tag">#{{ $shop->area->name }}</span>
                <span class="shop-tag">#{{ $shop->genre->name }}</span>
            </div>
            <!-- 詳細情報の表示 -->
            <div class="shop-detail-info">
                {{ $shop->detail }}
            </div>
        </div>
        <div class="reservation-content">

        </div>
    @endsection
