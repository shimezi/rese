@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css.login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <div class="login-header">
            <p>login</p>
        </div>
        <form class="login-form" method="POst" action="{{ route('login') }}">
            @csrf
            <div class="login-form_group">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" placeholder="email">
            </div>
            <div class="login-form_group">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" placeholder="password">
            </div>
            <button type="submit">ログイン</button>
        </form>
    </div>
@endsection
