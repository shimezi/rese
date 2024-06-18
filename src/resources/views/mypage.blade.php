@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <!-- ウェルカムメッセージ -->
    <h1 class="users-name">{{ Auth::user()->name }}さん</h1>
    <!-- 予約状況コンテンツ -->
    <div class="reservation-content">
        <h3>予約状況</h3>
        <!-- 予約データが存在する場合 -->
        @if ($reservations->isNotEmpty())
            @foreach ($reservations->sortBy('check_in') as $index => $reservation)
                <div class="reservation-detail">
                    <p><span class="icon"><i class="fa-regular fa-clock"></i></span>予約{{ $index + 1 }}</p>
                    <p><span class="reservation-label">Shop</span>{{ $reservation->shop->name }}</p>
                    <p><span class="reservation-label">Date</span>{{ date('Y年m月d日', strtotime($reservation->check_in)) }}</p>
                    <p><span class="reservation-label">Time</span>{{ date('H:i', strtotime($reservation->check_in)) }}</p>
                    <p><span class="reservation-label">Number</span>{{ $reservation->number_of_people }}人</p>
                </div>
            @endforeach
        @else
            <p>No reservation found.</p>
        @endif
    </div>
    <!-- お気に入りコンテンツ -->
@endsection
