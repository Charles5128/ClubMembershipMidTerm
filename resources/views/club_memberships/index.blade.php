@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Club Memberships</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- <a href="{{ route('club_memberships.create') }}" class="btn btn-primary mb-3"></a> --}}

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Club Name</th>
                <th>Membership Date</th>
                @if(auth()->user()->hasRole('Administrator'))
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($memberships as $membership)
                <tr>
                    <td>{{ $membership->id }}</td>
                    <td>{{ $membership->student_name }}</td>
                    <td>{{ $membership->club_name }}</td>
                    <td>{{ $membership->membership_date }}</td>
                    @if(auth()->user()->hasRole('Administrator'))
                        <td>
                            <a href="{{ route('club_memberships.edit', $membership->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('club_memberships.destroy', $membership->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
