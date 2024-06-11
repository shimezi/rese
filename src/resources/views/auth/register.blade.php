@extends('layouts.app')

@section('css')
    <link rel="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <div class="register-header">
            <p>register</p>
        </div>
        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-form_group">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <input type="username" placeholder="username">
            </div>
            <div class="register-form_group">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" placeholder="email">
            </div>
            <div class="register-form_group">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" placeholder="password">
            </div>
            <button type="submit">登録</button>
        </form>

    </div>
@endsection
