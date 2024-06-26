@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="detail-container no-navigation"> <!-- クラスを追加 -->

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

        <!-- エラーメッセージ表示 -->
        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @auth
            <!-- 予約フォーム -->
            <div class="reservation-content">
                <h1 class="header">予約</h1>
                <form class="reservation-form" method="POST" action="{{ route('reservation.confirm') }}">
                    @csrf

                    <!-- Hidden field for shop_id with class -->
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                    <!-- 日付の入力フィールド -->
                    <div class="reservation-form__group">
                        <label class="reservation-form__label sr-only" for="date">日付</label>
                        <input class="reservation-form__input" type="date" name="date" id="date"
                            placeholder="2021/04/01" min="{{ now()->addDay()->format('Y-m-d') }}" value="{{ old('date') }}">
                    </div>

                    <!-- 時間の選択 -->
                    <div class="reservation-form__group">
                        <label class="reservation-form__label sr-only" for="time">時間</label>
                        <input class="reservation-form__input" type="time" name="time" id="time" placeholder="17:00"
                            value="{{ old('time') }}">
                    </div>

                    <!-- 人数の選択 -->
                    <div class="reservation-form__group">
                        <label class="reservation-form__label sr-only" for="number_of_people"></label>
                        <select class="reservation-form__input" type="number" name="number_of_people" id="number_of_people"
                            placeholder="1人" value="{{ old('number_of_people') }}" min="1" max="10">
                            <option value="" disabled selected>人数</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{ $i }}">{{ $i }}人</option>
                            @endfor
                        </select>
                    </div>

                    <!-- 予約ボタン -->
                    <button class="reservation-form__button-confirm">確認</button>
                </form>
            </div>

            <!-- 確認フィールド -->
            @if (isset($data))
                <div class="confirm-content">
                    <form class="confirm-form" method="POST" action="{{ route('reservation.store') }}">
                        @csrf
                        <input class="hidden-input" type="hidden" name="shop_id" value="{{ $data['shop_id'] ?? '' }}">
                        <input class="hidden-input" type="hidden" name="date" value="{{ $data['date'] ?? '' }}">
                        <input class="hidden-input" type="hidden" name="time" value="{{ $data['time'] ?? '' }}">
                        <input class="hidden-input" type="hidden" name="number_of_people"
                            value="{{ $data['number_of_people'] ?? '' }}">

                        <div class="confirm-form__group">
                            <label class="confirm-form__label" for="date">date</label>
                            <p>{{ $data['date'] ?? '' }}</p>
                        </div>
                        <div class="confirm-form__group">
                            <label class="confirm-form__label" for="time">time</label>
                            <p>{{ $data['time'] ?? '' }}</p>
                        </div>
                        <div class="confirm-form__group">
                            <label class="confirm-form__label" for="number_of_people"></label>
                            <p>{{ $data['number_of_people'] ?? '' }}</p>
                        </div>
                        <button type="submit" class="reservation-form__button">予約</button>
                    </form>
                </div>
            @endif
        @endauth

        @guest
            <!-- 未ログインユーザーへのメッセージ -->
            <div class="guest-message">
                <p>予約をするには<a href="{{ route('login') }}">ログイン</a>または<a href="{{ route('register') }}">会員登録</a>が必要です。</p>
            </div>
        @endguest

    </div>
@endsection
