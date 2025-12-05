@extends('layouts.main')

@section('title', 'NGO Profile')

@section('content')
<div class="row mt-3">
    <div class="col-md-3 mb-3 mb-md-0">
        @include('pages.ngos._sidebar')
    </div>

    <div class="col-md-9">
        <div class="card shadow-sm border-0 dashboard-card mb-4">
            <div class="card-body">
                @php $user = auth()->user(); @endphp

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="mb-0">
                            {{ $user->organization_name ?? $user->name }}
                        </h3>
                        <small class="text-muted">
                            {{ $user->organization_type ?? 'Non-profit Organization' }}
                        </small>
                    </div>

                    <span class="badge bg-success">
                        <i class="bi bi-patch-check-fill me-1"></i> Verified NGO
                    </span>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted text-uppercase small">Contact info</h6>
                        <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $user->phone ?? '-' }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted text-uppercase small">Address</h6>
                        <p class="mb-1">{{ $user->address ?? '-' }}</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted text-uppercase small">Login role</h6>
                        <p class="mb-0 text-capitalize">{{ $user->role }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted text-uppercase small">Profile completeness</h6>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: 70%;"
                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">About 70% complete – you can add more details later.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
