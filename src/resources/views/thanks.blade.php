@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks-container">
        <p>ご予約ありがとうございます</p>
        <a href="{{ route('mypage') }}" class="button">戻る</a>
    </div>
@endsection
