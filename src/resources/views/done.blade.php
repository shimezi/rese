@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
    <div class="done-container">
        <p>会員登録ありがとうございます</p>
        <button type="submit">ログインする</button>
    </div>
@endsection
