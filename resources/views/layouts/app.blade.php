<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Club Membership</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Club Membership</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('club_memberships.index') }}">Club Memberships</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('club_memberships.create') }}">Add Membership</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">@yield('content')</div>
</body>
</html>
