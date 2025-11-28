@extends('frontend.layouts.master')

@section('title', 'User Registration')

@section('content')

    <!-- Custom Styles for Auth Pages -->

    <!-- Page Header -->
    <section class="page-header bg-gradient-bangladesh text-white py-5">
        <div class="container py-4">
            <h1 class="display-6 fw-bold text-center mb-0">Join Our Community!</h1>
        </div>
    </section>

    <!-- Registration Form Section -->
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="card register-card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-3x text-primary-teal mb-3"></i>
                        <h2 class="h4 fw-bold">Create New Account</h2>
                    </div>

                    <!-- Replace with your actual Laravel form setup -->
                    <form method="POST" action="{{ route('user.register.submit') }}">

                    @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe">
                            @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Minimum 8 characters">
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary-teal btn-lg fw-bold">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="mb-0 small text-muted">Already have an account?</p>
                        <a href="{{ route('user.login') }}" class="text-primary-teal fw-semibold text-decoration-none">Log In Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
