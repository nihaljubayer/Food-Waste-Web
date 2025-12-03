@extends('layouts.main')

@section('title', 'Donor Dashboard')

@section('content')
<div class="container py-4 py-md-5">

    {{-- ✅ Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Welcome Section --}}
    <div class="mb-4">
        <h2 class="fw-bold">Welcome, {{ $user->name }}</h2>
        <p class="text-muted">
            This is your donor panel. From here you can post surplus food, track your previous donations,
            and respond to pickup requests.
        </p>
    </div>

    {{-- Cards Section --}}
    <div class="row g-4">

        {{-- Post New Food --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Post New Food</h5>
                    <p class="card-text text-muted">
                        Share extra food so nearby NGOs can request pickup.
                    </p>
                    <a href="{{ route('donor.food.create') }}" class="btn btn-success btn-sm">
                        Post Now
                    </a>
                </div>
            </div>
        </div>

        {{-- My Donations --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold">My Donations</h5>
                    <p class="card-text text-muted">
                        View a history of all meals you have shared.
                    </p>
                    <a href="{{ route('donor.donations') }}" class="btn btn-success btn-sm">
                        View
                    </a>
                </div>
            </div>
        </div>

        {{-- Pickup Requests --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Pickup Requests</h5>
                    <p class="card-text text-muted">
                        See and manage your pickup requests.
                    </p>
                    <a href="{{ route('donor.pickups.create') }}" class="btn btn-success btn-sm me-2">
                        Request Pickup
                    </a>
                    <a href="{{ route('donor.pickups.index') }}" class="btn btn-outline-success btn-sm">
                        My Requests
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
