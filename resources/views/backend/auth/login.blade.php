@extends('backend.layouts.auth_master')

@section('title','Admin Login')

@section('content')
<!-- Admin Login Form Section -->
<div class="main-content-wrapper">
    <div class="container">
        <div class="row w-100 justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-4">
                <div class="card admin-card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-shield fa-3x text-primary-teal mb-3"></i>
                        <h2 class="h4 fw-bold">Admin Panel Login</h2>
                        <p class="text-muted small">Access reserved for authorized personnel only.</p>
                    </div>

                    <!-- Replace with your actual Laravel form setup for Admin -->
                    <form method="POST" action="{{route('admin.login.success')}}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Admin Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="admin@domain.com">
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

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary-teal btn-lg fw-bold">
                                Secure Login
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="mb-0 small text-muted">Trouble logging in?</p>
                        <a href="#" class="text-decoration-none small text-danger">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
