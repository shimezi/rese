@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <div class="login-inner">
            <div class="login-header">
                <p>Login</p>
            </div>
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-form__group">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <label class="login-form__label sr-only" for="email">email</label>
                    <input class="login-form__input" type="email" name="email" id="email" placeholder="Email"
                        value="{{ old('email') }}">
                </div>
                <div class="login-form__group">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <label class="login-form__label sr-only" for="password">password</label>
                    <input class="login-form__input" type="password" name="password" id="password" placeholder="Password"
                        value="{{ old('password') }}">
                </div>
                <button type="submit" class="login-button">ログイン</button>
            </form>
        </div>
    </div>
@endsection
