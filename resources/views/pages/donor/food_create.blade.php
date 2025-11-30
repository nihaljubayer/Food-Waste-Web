@extends('layouts.main')

@section('title', 'Post New Food')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">

            <h2 class="mb-3">Post New Food</h2>
            <p class="text-muted mb-4">
                Share your surplus food details. Nearby NGOs will be able to request pickup
                before the food expires.
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('donor.food.store') }}"
                  enctype="multipart/form-data"
                  class="card shadow-sm border-0 p-4">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Food Title *</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ old('title') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control"
                               value="{{ old('category') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control"
                               value="{{ old('quantity') }}" min="1">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" name="unit" class="form-control"
                               value="{{ old('unit') }}" placeholder="plates, boxes, kg">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Cooked At</label>
                        <input type="datetime-local" name="cooked_at"
                               class="form-control"
                               value="{{ old('cooked_at') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Best before (expiry)</label>
                        <input type="datetime-local" name="expiry_time"
                               class="form-control"
                               value="{{ old('expiry_time') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Pickup Time Range</label>
                        <div class="d-flex gap-1">
                            <input type="datetime-local" name="pickup_time_from"
                                   class="form-control"
                                   value="{{ old('pickup_time_from') }}">
                            <input type="datetime-local" name="pickup_time_to"
                                   class="form-control"
                                   value="{{ old('pickup_time_to') }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Pickup Address
                        <span class="text-muted small">(empty = use your saved address)</span>
                    </label>
                    <input type="text" name="pickup_address" class="form-control"
                           value="{{ old('pickup_address') }}"
                           placeholder="{{ $user->address ?? 'Your saved address will be used' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description / Notes</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Food Image (optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('donor.dashboard') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        Post Food
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
