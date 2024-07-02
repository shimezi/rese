@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <!-- ウェルカムメッセージ -->
    <h1 class="users-name">{{ Auth::user()->name }}さん</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- 予約状況コンテンツ -->
    <div class="reservation-content">
        <h3>予約状況</h3>
        <!-- 予約データが存在する場合 -->
        @if ($reservations->isNotEmpty())
            @foreach ($reservations->sortBy('check_in') as $index => $reservation)
                <div class="reservation-detail">
                    <p><span class="icon"><i class="fa-regular fa-clock"></i></span>予約{{ $index + 1 }}</p>
                    <p><span class="reservation-label">Shop</span>{{ $reservation->shop->name }}</p>
                    <p><span class="reservation-label">Date</span>{{ date('Y年m月d日', strtotime($reservation->check_in)) }}
                    </p>
                    <p><span class="reservation-label">Time</span>{{ date('H:i', strtotime($reservation->check_in)) }}</p>
                    <p><span class="reservation-label">Number</span>{{ $reservation->number_of_people }}人</p>
                    <!-- キャンセルボタン -->
                    <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" class="cancel-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">キャンセル</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>予約はありません。</p>
        @endif

        <!-- サンプルQRコードの表示 -->
        <div class="qr-code">
            <h2>QRコード</h2>
            @if (isset($qrCode))
                <img src="data:image/svg+xml;base64, {{ $qrCode }}" alt="QR Code">
            @else
                <p>QRコードが生成されていません。</p>
            @endif
        </div>

    </div>
    <!-- お気に入りコンテンツ -->
    <div class="favourite-content">
        <h2>お気に入り店舗</h2>
        @foreach ($favourites as $favourite)
            @if ($favourite->shop)
                <div class="shop-item">
                    <a href="{{ route('detail', ['id' => $favourite->shop->id]) }}">
                        <img src="{{ asset($favourite->shop->image_url) }}" alt="{{ $favourite->shop->name }}">
                        <h2>{{ $favourite->shop->name }}</h2>
                        <!-- ハッシュタグの表示 -->
                        <div class="shop-tags">
                            <span class="shop-tag">#{{ $favourite->shop->area->name }}</span>
                            <span class="shop-tag">#{{ $favourite->shop->genre->name }}</span>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endsection
