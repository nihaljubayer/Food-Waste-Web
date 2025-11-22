{{-- 
==========================================
  1. Layout Extend
==========================================
--}}
@extends('layouts.main')

@section('title', 'Donor Login')

@section('content')


{{-- 
==========================================
  3. Page Structure 
==========================================
--}}

<section class="donor-login-page">

    <div class="donor-login-card">

        {{-- --------------------------
            LEFT SIDE (Image + Text)
        --------------------------- --}}
        <div class="donor-login-left">
            <div class="donor-login-overlay">
                <h2>Donate & Make<br>Someone Feel Great</h2>
                <p>
                    Login to continue sharing surplus food 
                    and help NGOs distribute to the needy.
                </p>
            </div>
        </div>



        {{-- --------------------------
            RIGHT SIDE (Login Form)
        --------------------------- --}}
        <div class="donor-login-right">

            <h3 class="dl-title">Donor Login</h3>
            <p class="dl-subtitle">Welcome back! Please sign in.</p>

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="dl-alert">
                    {{ $errors->first() }}
                </div>
            @endif


            {{-- 
            ==========================================
              4. Login FORM
            ==========================================
            --}}
            <form method="POST" action="{{ route('pages.login') }}">
                @csrf

                {{-- Email --}}
                <div class="dl-field">
                    <label for="email">Donor Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}" required>
                </div>

                {{-- Password --}}
                <div class="dl-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="dl-btn">Login</button>

            </form>

            {{-- Bottom Link --}}
            <p class="dl-bottom-text">
                New Donor?  
                <a href="{{ route('register.doner') }}">Create an account</a>
            </p>

        </div>
    </div>
</section>

@endsection