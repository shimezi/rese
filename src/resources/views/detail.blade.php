@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="detail-container">
        <div class="detail-content">
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
            <form class="reservation-form" method="POST" action="{{ route('reservation.confirm') }}">
                @csrf
                <!-- Hidden field for shop_id with class -->
                <input class="hidden-input" type="hidden" name="shop_id" value="{{ $shop->id }}">
                <div class="reservation-form__group">
                    <label class="reservation-form__label sr-only" for="date">Date</label>
                    <input class="reservation-form__input" type="date" name="date" id="date" placeholder="Date"
                        value="{{ old('date') }}" required>
                </div>
                <div class="reservation-form__group">
                    <label class="reservation-form__label sr-only" for="time">Time</label>
                    <input class="reservation-form__input" type="time" name="time" id="time" placeholder="Time"
                        value="{{ old('time') }}" required>
                </div>
                <div class="reservation-form__group">
                    <label class="reservation-form__label sr-only" for="number_of_people">Number of people</label>
                    <input class="reservation-form__input" type="number" name="number_of_people" id="number_of_people"
                        placeholder="1人" value="{{ old('number_of_people') }}" min="1" required>
                </div>
                <button type="submit" class="reservation-form__button-confirm">確認</button>
            </form>
        </div>

        @if (isset($data))
            <!-- 確認フィールド -->
            <div class="confirm-content">
                <form class="reservation-form" method="POST" action="{{ route('reservation.store') }}">
                    @csrf
                    <input class="hidden-input" type="hidden" name="shop_id" value="{{ $data['shop_id'] ?? '' }}">
                    <input class="hidden-input" type="hidden" name="date" value="{{ $data['date'] ?? '' }}">
                    <input class="hidden-input" type="hidden" name="time" value="{{ $data['time'] ?? '' }}">
                    <input class="hidden-input" type="hidden" name="number_of_people"
                        value="{{ $data['number_of_people'] ?? '' }}">

                    <div class="reservation-form__group">
                        <label class="reservation-form__label" for="date">Date</label>
                        <p>{{ $data['date'] ?? '' }}</p>
                    </div>
                    <div class="reservation-form__group">
                        <label class="reservation-form__label" for="time">Time</label>
                        <p>{{ $data['time'] ?? '' }}</p>
                    </div>
                    <div class="reservation-form__group">
                        <label class="reservation-form__label" for="number_of_people"></label>
                        <p>{{ $data['number_of_people'] ?? '' }}</p>
                    </div>
                    <button type="submit" class="reservation-form__button">予約する</button>
                </form>
            </div>
    </div>
    @endif
@endsection
