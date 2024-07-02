@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="shop-content">
        @if (request()->has('query'))
            <h3>検索結果</h3>
            @if ($shops->isEmpty())
                <p>該当する店舗が見つかりませんでした</p>
            @endif
        @endif
        <div class="shop-list">
            @foreach ($shops as $shop)
                <div class="shop-item">
                    <a href="{{ route('detail', ['id' => $shop->id]) }}">
                        <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
                        <h2>{{ $shop->name }}</h2>
                        <!-- ハッシュタグの表示 -->
                        <div class="shop-tags">
                            <span class="shop-tag">#{{ $shop->area->name }}</span>
                            <span class="shop-tag">#{{ $shop->genre->name }}</span>
                        </div>
                    </a>
                    {{-- お気に入りボタン --}}
                    @auth
                        @if (auth()->user()->favourites->where('shop_id', $shop->id)->isEmpty())
                            <form action="{{ route('favourite.store') }}" method="POST" class="favourire-form">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <button type="submit" class="favourite-button">お気に入り</button>
                            </form>
                        @else
                            <form action="{{ route('favourite.destroy', $shop->id) }}" method="POST"
                                class="shop-item__favourite-fotm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="shop-item__favourite-buitton">削除</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
@endsection
