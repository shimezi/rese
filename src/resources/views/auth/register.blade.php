@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <div class="register-inner">
            <div class="register-header">
                <p>Registration</p>
            </div>
            <form class="register-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="register-form__group">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <label class="register-form__label sr-only" for="name">username</label>
                    <input class="register-form__input" type="text" name="name" id="name" placeholder="username"
                        value="{{ old('name') }}">
                </div>
                <div class="register-form__group">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <label class="register-form__label sr-only" for="email">email</label>
                    <input class="register-form__input" type="email" name="email" id="email" placeholder="email"
                        value="{{ old('email') }}">
                </div>
                <div class="register-form__group">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <label class="register-form__label sr-only" for="password">password</label>
                    <input class="register-form__input" type="password" name="password" id="password"
                        placeholder="password" value="{{ old('password') }}">
                </div>
                <button type="submit" class="register-button">登録</button>
            </form>
        </div>
    </div>
@endsection
