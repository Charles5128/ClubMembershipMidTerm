@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">{{ __('Login') }}</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

       
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autofocus
                               oninput="validateEmail()">
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>

 
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div class="input-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required oninput="validatePassword()">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>


                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg animate-btn">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>

    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });


    function validateEmail() {
        const email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!email.match(emailPattern)) {
            emailError.textContent = "Please enter a valid email address.";
            document.getElementById('email').classList.add('is-invalid');
        } else {
            emailError.textContent = "";
            document.getElementById('email').classList.remove('is-invalid');
        }
    }

    function validatePassword() {
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');

        if (password.length < 6) {
            passwordError.textContent = "Password must be at least 6 characters long.";
            document.getElementById('password').classList.add('is-invalid');
        } else {
            passwordError.textContent = "";
            document.getElementById('password').classList.remove('is-invalid');
        }
    }
</script>

<style>

    .animate-btn {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .animate-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }


    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .input-group .btn {
        background-color: white;
    }
</style>
@endpush
@endsection
