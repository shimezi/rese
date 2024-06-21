@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks-container">
        <p>ご予約ありがとうございます</p>
        <button class="thanks-button">戻る</button>
    </div>
@endsection
