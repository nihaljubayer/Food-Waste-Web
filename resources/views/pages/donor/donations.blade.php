@extends('layouts.main')

@section('title', 'My Donations')

@section('content')
<div class="container py-4 py-md-5">

    {{-- Page heading --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1 fw-bold">My Donations</h2>
            <p class="text-muted mb-0">
                A quick overview of all the meals you have shared so far.
            </p>
        </div>

        <a href="{{ route('donor.food.create') }}" class="btn btn-success">
            + Post New Food
        </a>
    </div>

    @if($posts->isEmpty())
        {{-- Empty state --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-emoji-smile fs-1 text-secondary"></i>
                </div>
                <h5 class="fw-semibold mb-2">No donations yet</h5>
                <p class="text-muted mb-3">
                    Start by posting your first surplus meal so nearby NGOs can request it.
                </p>
                <a href="{{ route('donor.food.create') }}" class="btn btn-success">
                    Post Food Now
                </a>
            </div>
        </div>
    @else

        {{-- Table inside a nice card --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40%">Title</th>
                                <th style="width: 15%">Quantity</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 30%">Posted at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    {{-- Title --}}
                                    <td class="fw-semibold">
                                        {{ $post->title }}
                                        @if(!empty($post->category))
                                            <div class="small text-muted">
                                                Category: {{ $post->category }}
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Quantity --}}
                                    <td>
                                        @if($post->quantity)
                                            {{ $post->quantity }} {{ $post->unit }}
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>

                                    {{-- Status with colored badge --}}
                                    <td>
                                        @php
                                            $status = $post->status ?? 'available';
                                        @endphp

                                        @if($status === 'available')
                                            <span class="badge bg-success">Available</span>
                                        @elseif($status === 'reserved')
                                            <span class="badge bg-warning text-dark">Reserved</span>
                                        @elseif($status === 'completed')
                                            <span class="badge bg-primary">Completed</span>
                                        @else
                                            <span class="badge bg-danger">{{ ucfirst($status) }}</span>
                                        @endif
                                    </td>

                                    {{-- Posted time --}}
                                    <td>
                                        {{ $post->created_at->format('d M Y, h:i A') }}
                                        <div class="small text-muted">
                                            {{ $post->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endif
</div>
@endsection



