@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>User Profile</h2>
    

    <img src="{{ asset('pangan.jpg') }}" alt="Profile Picture" class="rounded-circle" width="150" height="150">

    <p class="mt-3"><strong>Name:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Role:</strong> {{ auth()->user()->roles->pluck('name')->first() }}</p>
</div>
@endsection
