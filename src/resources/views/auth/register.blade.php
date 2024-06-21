@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <div class="register-header">
            <p>registration</p>
        </div>
        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-form_group">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <label class="register-form_label sr-only" for="name">username</label>
                <input class="register-form_input" type="text" name="name" id="name" placeholder="username"
                    value="{{ old('name') }}">
            </div>
            <div class="register-form_group">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <label class="register-form_label sr-only" for="email">email</label>
                <input class="register-form_input" type="email" name="email" id="email" placeholder="email"
                    value="{{ old('email') }}">
            </div>
            <div class="register-form_group">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <label class="register-form_label sr-only" for="password">password</label>
                <input class="register-form_input" type="password" name="password" id="password" placeholder="password"
                    value="{{ old('password') }}">
            </div>
            <button type="submit" class="btn-register">会員登録</button>
        </form>
    </div>
@endsection
