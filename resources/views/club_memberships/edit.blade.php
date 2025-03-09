@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Club Membership</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('club_memberships.update', $clubMembership->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" value="{{ $clubMembership->student_name }}" required>
        </div>
        <div class="mb-3">
            <label for="club_name" class="form-label">Club Name</label>
            <input type="text" name="club_name" class="form-control" value="{{ $clubMembership->club_name }}" required>
        </div>
        <div class="mb-3">
            <label for="membership_date" class="form-label">Membership Date</label>
            <input type="date" name="membership_date" class="form-control" value="{{ $clubMembership->membership_date }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
