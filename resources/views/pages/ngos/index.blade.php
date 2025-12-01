@extends('layouts.main') {{-- jodi tomader layout er naam onno hoi, ekhane change kore nao --}}

@section('title', 'NGO Dashboard')

@section('content')
    <div class="container">
        <h1>NGO List</h1>

        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('ngos.create') }}">+ Add New NGO</a>

        <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ngos as $ngo)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ngo->name }}</td>
                        <td>{{ $ngo->email }}</td>
                        <td>{{ $ngo->phone }}</td>
                        <td>{{ $ngo->address }}</td>
                        <td>{{ ucfirst($ngo->status) }}</td>
                        <td>
                            <a href="{{ route('ngos.edit', $ngo->id) }}">Edit</a>

                            <form action="{{ route('ngos.destroy', $ngo->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No NGO found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
