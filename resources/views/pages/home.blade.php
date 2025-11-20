@extends('layouts.main')

@section('title','Food Donation')

@section('content')

<style>
    /* ---------- HERO ---------- */
    .hero-section{
        width:100%;
        min-height:90vh;
        background:url('{{ asset('images/h2.jpg') }}') center center/cover no-repeat;
        position:relative;
        color:#fff;
    }
    .hero-overlay{
        position:absolute;
        inset:0;
        background:linear-gradient(
            to bottom,
            rgba(0,0,0,0.55),
            rgba(0,0,0,0.75)
        );
    }
    .hero-content{
        position:relative;
        z-index:2;
        min-height:90vh;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        text-align:center;
        padding:0 1rem;
    }
    .hero-title{
        font-size:clamp(2.5rem,5vw,4rem);
        font-weight:800;
    }
    .hero-subtitle{
        max-width:720px;
        font-size:1.05rem;
        margin-top:1rem;
    }
    .hero-buttons .btn{
        padding:.7rem 2.5rem;
        border-radius:999px;
        font-weight:600;
        margin:0 .4rem;
    }

    /* ---------- GENERIC ---------- */
    .section-heading{
        font-weight:700;
    }
    .icon-circle{
        width:52px;
        height:52px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:1.5rem;
        background:#f3f4f6;
        color:#198754;
    }

    /* ---------- STATS BAND ---------- */
    .stats-band{
        background:#0f766e;
        color:#fff;
    }
    .stats-band h3{
        font-weight:700;
    }

    /* ---------- FOOTER ---------- */
    footer{
        background:#0f172a;
        color:#cbd5f5;
    }
    footer a{
        color:#e5e7eb;
        text-decoration:none;
    }
    footer a:hover{
        text-decoration:underline;
    }
</style>

{{-- ================= HERO SECTION ================= --}}
<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="hero-title">A meal shared is a smile shared</h1>

        <p class="hero-subtitle">
            Welcome to Food Donation, where we bridge the gap between abundance and need
            by connecting surplus food from homes, restaurants and events
            to nearby NGOs and volunteers.
        </p>

        <div class="hero-buttons mt-4">
            <a href="{{ route('signup.choice') }}" class="btn btn-warning btn-lg me-3">SignUp</a>
            <a href="{{ route('login') }}" class="btn btn-warning btn-lg">SignIn</a>

        </div>

        <p class="mt-4 mb-0">
            Over 30% of daily meals served to those in need and 100,000+ meals distributed.
        </p>
    </div>
</section>

{{-- ================= WHY SECTION ================= --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-md-6">
                <h2 class="section-heading mb-3">Why Reduce Food Waste?</h2>
                <p class="mb-2">
                    Every day, huge amounts of edible food are thrown away while many people go to bed hungry.
                    Our Food Waste Donor Management System helps convert that surplus into life-saving meals.
                </p>
                <p class="mb-0">
                    By joining as a donor or organization, you support a smarter, kinder and more sustainable city.
                </p>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-white shadow-sm rounded">
                            <div class="icon-circle mb-2">
                                <i class="bi bi-people"></i>
                            </div>
                            <h5>Support Communities</h5>
                            <p class="small mb-0">
                                Help local NGOs and shelters serve meals to families in crisis.
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white shadow-sm rounded">
                            <div class="icon-circle mb-2">
                                <i class="bi bi-recycle"></i>
                            </div>
                            <h5>Reduce Waste</h5>
                            <p class="small mb-0">
                                Cut down the food going to landfills and protect the environment.
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white shadow-sm rounded">
                            <div class="icon-circle mb-2">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h5>Quick Matching</h5>
                            <p class="small mb-0">
                                Real-time notifications help NGOs collect food before it spoils.
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white shadow-sm rounded">
                            <div class="icon-circle mb-2">
                                <i class="bi bi-heart"></i>
                            </div>
                            <h5>Easy to Use</h5>
                            <p class="small mb-0">
                                Simple registration, clear steps and a clean interface for everyone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= HOW IT WORKS ================= --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-heading text-center mb-4">How the System Works</h2>
        <p class="text-center text-muted mb-5">
            A simple three-step flow ensures safe and fast movement of food from donors to receivers.
        </p>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 h-100 bg-white shadow-sm rounded">
                    <div class="icon-circle mb-3 mx-auto">
                        1
                    </div>
                    <h5>Donor Posts Food</h5>
                    <p class="small mb-0">
                        Donors share food details, quantity, location and pickup time from their dashboard.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 h-100 bg-white shadow-sm rounded">
                    <div class="icon-circle mb-3 mx-auto">
                        2
                    </div>
                    <h5>NGOs Request & Match</h5>
                    <p class="small mb-0">
                        Nearby NGOs view available donations, send pickup requests and receive confirmation.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 h-100 bg-white shadow-sm rounded">
                    <div class="icon-circle mb-3 mx-auto">
                        3
                    </div>
                    <h5>Pickup & Serve</h5>
                    <p class="small mb-0">
                        Approved requests are collected, safely transported and served to people in need.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= STATS BAND ================= --}}
<section class="stats-band py-3">
    
</section>

{{-- ================= FOR DONORS & ORGS ================= --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-heading text-center mb-4">Who Can Join?</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="bg-white shadow-sm rounded p-4 h-100">
                    <h4>For Donors</h4>
                    <p class="small">
                        Restaurants, hotels, caterers, households and event organizers who have
                        safe extra food that would otherwise be wasted.
                    </p>
                    <ul class="small">
                        <li>Post surplus food in a few clicks</li>
                        <li>Set expiry and pickup time</li>
                        <li>Track previous donations</li>
                    </ul>
                    <a href="{{ route('register.donor') }}" class="btn btn-success mt-2">
                        Register as Donor
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-white shadow-sm rounded p-4 h-100">
                    <h4>For Organizations</h4>
                    <p class="small">
                        NGOs, shelters, orphanages and community kitchens who distribute food to people in need.
                    </p>
                    <ul class="small">
                        <li>View donations near your location</li>
                        <li>Send pickup requests quickly</li>
                        <li>Maintain beneficiary and pickup records</li>
                    </ul>
                    <a href="{{ route('register.organization') }}" class="btn btn-primary mt-2">
                        Register as Organization
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= FINAL CALL TO ACTION ================= --}}
<section class="py-5">
    <div class="container text-center">
        <h2 class="section-heading mb-3">Ready to share a meal?</h2>
        <p class="text-muted mb-4">
            Join our Food Waste Donor Management System and help make sure that no safe food
            ends up in the bin while people are still hungry.
        </p>
        <a href="{{ route('signup.choice') }}" class="btn btn-success btn-lg px-5">
            Get Started
        </a>
    </div>
</section>

{{-- ================= FOOTER ================= --}}
<footer class="py-4 mt-3">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <p class="mb-2 mb-md-0 small">
            © {{ date('Y') }} Food Waste Donor Management System. All rights reserved.
        </p>
        <p class="mb-0 small">
            Contact: <a href="mailto:info@foodwasteproject.com">info@foodwasteproject.com</a>
        </p>
    </div>
</footer>

@endsection
