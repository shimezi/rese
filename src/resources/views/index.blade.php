@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="shop-list">
        @foreach ($shops as $shop)
            <div class="shop-item">
                <a href="{{ route('shop.detail', ['id' => $shop->id]) }}">
                    <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
                    <h2>{{ $shop->name }}</h2>
                    <!-- ハッシュタグの表示 -->
                    <div class="shop-tags">
                        <span class="shop-tag">#{{ $shop->area->name }}</span>
                        <span class="shop-tag">#{{ $shop->genre->name }}</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
