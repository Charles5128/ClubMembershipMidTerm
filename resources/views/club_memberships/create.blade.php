@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Club Membership</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('club_memberships.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="club_name" class="form-label">Club Name</label>
            <input type="text" name="club_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="membership_date" class="form-label">Membership Date</label>
            <input type="date" name="membership_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
