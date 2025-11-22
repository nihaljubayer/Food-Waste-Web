@extends('layouts.main')

@section('title','Registration')

{{-- CSS Section --}}
@section('css')
<style>
    .register-section {
        padding: 50px 0;
        background: url('/images/blur-bg.jpg') center/cover no-repeat;
    }

    .reg-card {
        padding: 20px 25px;
        background: rgba(0,0,0,0.7);
        border-radius: 10px;
        color: #ffffff;
    }

    .reg-card h3 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .reg-highlight {
        color: #32ff7e;
    }
</style>
@endsection


{{-- HTML Section --}}


@section('content')

<section class="register-section">
    <div class="container text-white">

        <h2 class="text-center mb-4">REGISTRATION</h2>

        <div class="row justify-content-center g-4">

            {{-- Organizations card --}}
            <div class="col-md-5">
                <div class="reg-card">
                    <h3>For <span class="reg-highlight">Organizations</span></h3>
                    <p>
                        Join our food donation platform and make a significant impact
                        in the fight against hunger.
                    </p>
                    <a href="{{ route('register.organization') }}" class="btn btn-warning mt-2">
                        Register
                    </a>
                </div>
            </div>

            {{-- Donors card --}}
            <div class="col-md-5">
                <div class="reg-card">
                    <h3>For <span class="reg-highlight">Donors</span></h3>
                    <p>
                        Register as a donor and share your surplus food to help those in need.
                    </p>
                    <a href="{{ route('register.donor') }}" class="btn btn-warning mt-2">
                        Register
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

