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
        <div class="reservation-form_content">
            <h1 class="header">予約</h1>
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <div class="reservation-form_group">
                    <input type="date" id="date" name="date" placeholder="2021/4/01" value="{{ old('date') }}">
                </div>
                <div class="reservation-form_group">
                    <input type="time" id="time" name="time" placeholder="17:00" value="{{ old('time') }}">
                </div>
                <div class="reservation-form_group">
                    <input type="number_of_people" id="number_of_people" name="number_of_people" placeholder="1人"
                        value="{{ old('number_of_people') }}" required>
                </div>
                <button type="submit">予約する</button>
            </form>
        </div>
    @endsection
