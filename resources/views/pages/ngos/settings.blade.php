@extends('layouts.main')

@section('title', 'NGO Settings')

@section('content')
<div class="row mt-3">
    <div class="col-md-3 mb-3 mb-md-0">
        @include('pages.ngos._sidebar')
    </div>

    <div class="col-md-9">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                @php $user = auth()->user(); @endphp

                <h3 class="mb-1">Account Settings</h3>
                <small class="text-muted">Update your NGO account details.</small>
                <hr>

                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Organization Name</label>
                            <input type="text" class="form-control"
                                   value="{{ $user->organization_name ?? $user->name }}" disabled>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Organization Type</label>
                            <input type="text" class="form-control"
                                   value="{{ $user->organization_type ?? '' }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{ $user->phone }}" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="3" disabled>{{ $user->address }}</textarea>
                    </div>

                    <button type="button" class="btn btn-primary" disabled>
                        Save Changes (coming soon)
                    </button>
                    <small class="text-muted ms-2">We’ll connect this form to backend later.</small>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
