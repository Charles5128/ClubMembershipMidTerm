@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome, {{ auth()->user()->name }}</h2>
    <p><strong>Address:</strong> Cabulijan</p>
    <p><strong>Course:</strong> BS Information Technology</p>
    <p><strong>Year:</strong> 3rd Year</p>
</div>
@endsection
