@extends('frontend.layouts.master')

@section('title', 'User Login')

@section('content')

    <!-- Custom Styles for Auth Pages -->


    <!-- Page Header -->
    <section class="page-header bg-gradient-bangladesh text-white py-5">
        <div class="container py-4">
            <h1 class="display-6 fw-bold text-center mb-0">Welcome Back!</h1>
        </div>
    </section>

    <!-- Login Form Section -->
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="card login-card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-lock fa-3x text-primary-teal mb-3"></i>
                        <h2 class="h4 fw-bold">Sign In to Your Account</h2>
                    </div>


                    <form id="loginForm"  method="POST" action="{{ route('user.login.submit') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="you@example.com">
                            <!-- Example error display -->
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <a href="#" class="small text-muted text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="d-grid">
                            <input type="hidden" id="lat" name="lat">
                            <input type="hidden" id="lon" name="lon">

                            <button type="button" class="btn btn-primary w-100" onclick="requestLocationAndLogin()">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="mb-0 small text-muted">Don't have an account?</p>
                        <a href="{{ route('user.register') }}" class="text-primary-teal fw-semibold text-decoration-none">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
