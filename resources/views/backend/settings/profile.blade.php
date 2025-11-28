@extends('backend.layouts.master')

@section('title','Admin Profile')

@section('content')

    <div class="container-fluid py-4">
        <h2 class="mb-4 text-secondary"><i class="fas fa-user-edit me-2"></i> Edit Profile</h2>

        <div class="row">
            <!-- Left Column: Personal Info -->
            <div class="col-lg-8">
                <!-- Personal Information Card -->
                <div class="card profile-card mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 text-secondary">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="inputRole" value="{{ $user->role }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputBio" class="col-sm-3 col-form-label">Bio</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="inputBio" name="bio" rows="3">{{ old('bio', $user->bio ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password Update Card -->
                <div class="card profile-card">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 text-secondary">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="currentPassword" class="col-sm-4 col-form-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                                    @error('current_password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPassword" class="col-sm-4 col-form-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="newPassword" name="password" required>
                                    @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Avatar Upload -->
            <div class="col-lg-4">
                <div class="card profile-card">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 text-secondary">Profile Picture</h5>
                    </div>
                    <div class="card-body avatar-container text-center">
                        @if($user->avatar && file_exists(public_path($user->avatar)))
                            <img src="{{ asset($user->avatar) }}" alt="Profile Picture" class="w-100">
                        @else


                        <div class="user-avatar-lg mb-3">

                                <img src="{{ asset('backend/img/default-avatar.png') }}" alt="" class="rounded-circle w-100">
                            @endif

                        </div>

                        <p class="text-muted mb-3">Allowed formats: JPG, PNG. Max size: 2MB.</p>
                        <form action="{{ route('admin.profile.avatar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" class="form-control mb-3" id="avatarUpload" name="avatar" accept="image/*" required>
                            <button type="submit" class="btn btn-secondary btn-sm">Upload New Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
