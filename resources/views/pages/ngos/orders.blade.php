@extends('layouts.main')

@section('title', 'NGO Orders')

@section('content')
<div class="row mt-3">
    <div class="col-md-3 mb-3 mb-md-0">
        @include('pages.ngos._sidebar')
    </div>

    <div class="col-md-9">
        <div class="card shadow-sm border-0 dashboard-card mb-3">
            <div class="card-body">
                <h3 class="mb-1">Pickup Requests / Orders</h3>
                <small class="text-muted">All food pickup requests handled by your organization.</small>
            </div>
        </div>

        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <span class="fw-semibold">
                    <i class="bi bi-box-seam me-1"></i> Recent Orders
                </span>

                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm" style="width: 140px;">
                        <option selected>Status: All</option>
                        <option>Pending</option>
                        <option>Accepted</option>
                        <option>Completed</option>
                    </select>
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search donor..." disabled>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="p-4 text-center text-muted">
                    <i class="bi bi-inbox display-6 d-block mb-2"></i>
                    <p class="mb-1">No pickup requests yet.</p>
                    <small>Once donors send pickup requests and you accept them, they will appear here.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
