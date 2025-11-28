@extends('backend.layouts.master')

@section('title', isset($spot) ? 'Edit Spot' : 'Create Spot')

@section('content')
    <main class="main-content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">{{ isset($spot) ? 'Edit Spot' : 'Create New Spot' }}</h2>
                <a href="{{ route('admin.spots.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Spots
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($spot) ? route('admin.spots.update', $spot) : route('admin.spots.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($spot))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Spot Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $spot->name ?? '') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $spot->description ?? '') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location *</label>
                                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $spot->location ?? '') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category *</label>
                                            <select class="form-select" id="category" name="category" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category }}" {{ old('category', $spot->category ?? '') == $category ? 'selected' : '' }}>
                                                        {{ $category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="entry_fee" class="form-label">Entry Fee (BDT) *</label>
                                            <input type="number" class="form-control" id="entry_fee" name="entry_fee" step="0.01" min="0" value="{{ old('entry_fee', $spot->entry_fee ?? 0) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="opening_hours" class="form-label">Opening Hours</label>
                                            <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $spot->opening_hours ?? '') }}" placeholder="e.g., 9:00 AM - 6:00 PM">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="highlights" class="form-label">Highlights</label>
                                    <textarea class="form-control" id="highlights" name="highlights" rows="3" placeholder="Enter key highlights separated by commas">{{ old('highlights', $spot->highlights ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Spot Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @if(isset($spot) && $spot->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $spot->image) }}" alt="{{ $spot->name }}" class="img-thumbnail" width="200">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $spot->latitude ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $spot->longitude ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $spot->is_featured ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Featured Spot
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $spot->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                {{ isset($spot) ? 'Update Spot' : 'Create Spot' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
