@extends('layouts.main')

@section('title', 'Login')

@section('content')
<style>
    .auth-container {
        max-width: 450px;
        margin: 60px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .auth-title {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 10px;
        color: #0a4a45;
    }

    .auth-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 25px;
        font-size: 1rem;
    }

    .auth-field label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    .auth-field input {
        width: 100%;
        padding: 12px;
        border: 1px solid #bbb;
        border-radius: 8px;
        font-size: 1rem;
        outline: none;
        transition: 0.2s;
    }

    .auth-field input:focus {
        border-color: #0a8872;
        box-shadow: 0 0 4px rgba(10,136,114,0.4);
    }

    .auth-btn {
        width: 100%;
        padding: 12px;
        background: #0a8872;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 600;
        margin-top: 10px;
        cursor: pointer;
        transition: 0.2s;
    }

    .auth-btn:hover {
        background: #086f5c;
    }

    .auth-bottom {
        text-align: center;
        margin-top: 18px;
        font-size: 1rem;
    }

    .auth-bottom a {
        color: #0a8872;
        font-weight: 600;
        text-decoration: none;
    }

    .auth-bottom a:hover {
        text-decoration: underline;
    }
</style>


<div class="auth-container">

    <h2 class="auth-title">Login</h2>
    <p class="auth-subtitle">Welcome back! Please sign in to continue.</p>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="auth-field">
            <label for="email">Email</label>
            <input type="email" name="email" required value="{{ old('email') }}">
        </div>

        <div class="auth-field" style="margin-top: 15px;">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>

        <button class="auth-btn">Login</button>
    </form>

    <p class="auth-bottom">
        New here? <a href="{{ route('register.donor') }}">Create an account</a>
    </p>

</div>
@endsection
