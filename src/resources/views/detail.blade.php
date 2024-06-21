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
        <!-- 予約フォーム -->
        <div class="reservation-content">
            <h1 class="header">予約</h1>
            <form class="reservation-form" method="POST" action="{{ route('reservation.store') }}">
                @csrf
                <!-- Hidden field for shop_id with class -->
                <input class="hidden-input" type="hidden" name="shop_id" value="{{ $shop->id }}">

                <div class="reservation-form_group">
                    <label class="reservation-form_label sr-only" for="date">Date</label>
                    <input class="reservation-form_input" type="date" name="date" id="date" placeholder="Date"
                        value="{{ old('date') }}" required>
                </div>
                <div class="reservation-form_group">
                    <label class="reservation-form_label sr-only" for="time">Time</label>
                    <input class="reservation-form_input" type="time" name="time" id="time" placeholder="Time"
                        value="{{ old('time') }}" required>
                </div>
                <div class="reservation-form_group">
                    <label class="reservation-form_label sr-only" for="guests">Number of Guests</label>
                    <input class="reservation-form_input" type="number" name="number_of_people" id="guests"
                        placeholder="1人" value="{{ old('number_of_people') }}" min="1" required>
                </div>
                <button type="submit">Reserve</button>
            </form>
        </div>
    </div>
@endsection
