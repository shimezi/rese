@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <div class="login-header">
            <p>login</p>
        </div>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-form_group">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <label class="login-form_label sr-only" for="email">email</label>
                <input class="login-form_input" type="email" name="email" id="email" placeholder="email"
                    value="{{ old('email') }}">
            </div>
            <div class="login-form_group">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <label class="login-form_label sr-only" for="password">password</label>
                <input class="login-form_input" type="password" name="password" id="password" placeholder="password"
                    value="{{ old('password') }}">
            </div>
            <button type="submit">ログイン</button>
        </form>
    </div>
@endsection
