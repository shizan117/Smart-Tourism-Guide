@extends('backend.layouts.master')

@section('title', 'Edit Spot - ' . $spot->name)

@section('content')
    <main class="main-content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">Edit Spot: {{ $spot->name }}</h2>
                <a href="{{ route('admin.spots.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Spots
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.spots.update', $spot) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Spot Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name"
                                           value="{{ old('name', $spot->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description" rows="4" required>{{ old('description', $spot->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('location') is-invalid @enderror"
                                                   id="location" name="location"
                                                   value="{{ old('location', $spot->location) }}" required>
                                            @error('location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category }}" {{ old('category', $spot->category) == $category ? 'selected' : '' }}>
                                                        {{ $category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="entry_fee" class="form-label">Entry Fee (BDT) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('entry_fee') is-invalid @enderror"
                                                   id="entry_fee" name="entry_fee" step="0.01" min="0"
                                                   value="{{ old('entry_fee', $spot->entry_fee) }}" required>
                                            @error('entry_fee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="opening_hours" class="form-label">Opening Hours</label>
                                            <input type="text" class="form-control @error('opening_hours') is-invalid @enderror"
                                                   id="opening_hours" name="opening_hours"
                                                   value="{{ old('opening_hours', $spot->opening_hours) }}"
                                                   placeholder="e.g., 9:00 AM - 6:00 PM">
                                            @error('opening_hours')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="highlights" class="form-label">Highlights</label>
                                    <textarea class="form-control @error('highlights') is-invalid @enderror"
                                              id="highlights" name="highlights" rows="3"
                                              placeholder="Enter key highlights separated by commas">{{ old('highlights', $spot->highlights) }}</textarea>
                                    @error('highlights')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Separate highlights with commas</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="latitude" class="form-label">Latitude</label>
                                            <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                                   id="latitude" name="latitude"
                                                   value="{{ old('latitude', $spot->latitude) }}"
                                                   placeholder="e.g., 23.810331">
                                            @error('latitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="longitude" class="form-label">Longitude</label>
                                            <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                                   id="longitude" name="longitude"
                                                   value="{{ old('longitude', $spot->longitude) }}"
                                                   placeholder="e.g., 90.412521">
                                            @error('longitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Current Image Preview -->
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <div class="text-center">
                                        @if($spot->image)
                                            <img src="{{asset($spot->image)  }}"
                                                 alt=""
                                                 class="img-thumbnail mb-2"
                                                 style="max-height: 200px; object-fit: cover;">
                                            <div class="form-text">Current spot image</div>
                                        @else
                                            <div class="text-muted py-4 border rounded">
                                                <i class="fas fa-image fa-3x mb-2"></i>
                                                <div>No image uploaded</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Update Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           id="image" name="image" accept="image/*">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        Recommended size: 800x600px. Max: 2MB
                                    </div>
                                </div>

                                <!-- Status Toggles -->
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Spot Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                       id="is_featured" name="is_featured" value="1"
                                                    {{ old('is_featured', $spot->is_featured) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_featured">
                                                    Featured Spot
                                                </label>
                                            </div>
                                            <div class="form-text">Show this spot in featured sections</div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                       id="is_active" name="is_active" value="1"
                                                    {{ old('is_active', $spot->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-text">Show this spot to visitors</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Spot Statistics -->
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">Spot Statistics</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="stat-number text-primary">{{ $spot->view_count }}</div>
                                                <div class="stat-label">Views</div>
                                            </div>
                                            <div class="col-6">
                                                <div class="stat-number text-success">{{ $spot->review_count }}</div>
                                                <div class="stat-label">Reviews</div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-2">
                                            <div class="star-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="{{ $i <= $spot->rating ? 'fas' : ($i - 0.5 <= $spot->rating ? 'fas fa-star-half-alt' : 'far') }} fa-star"></i>
                                                @endfor
                                            </div>
                                            <small class="text-muted">Rating: {{ number_format($spot->rating, 1) }}/5</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('admin.spots.index') }}" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Spot
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Spot Card -->
            <div class="card mt-4 border-danger">
                <div class="card-header bg-danger text-white">
                    <h6 class="mb-0">Danger Zone</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">
                        Once you delete a spot, there is no going back. Please be certain.
                    </p>
                    <form action="{{ route('admin.spots.destroy', $spot) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this spot? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete This Spot
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <style>
        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .stat-label {
            font-size: 0.875rem;
            color: #6c757d;
        }
        .form-switch .form-check-input {
            width: 3em;
            height: 1.5em;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-generate slug from name
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');

            if (nameInput && slugInput) {
                nameInput.addEventListener('blur', function() {
                    if (!slugInput.value) {
                        const slug = this.value
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9 -]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
                        slugInput.value = slug;
                    }
                });
            }

            // Image preview
            const imageInput = document.getElementById('image');
            const currentImage = document.querySelector('img.img-thumbnail');

            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            if (currentImage) {
                                currentImage.src = e.target.result;
                            }
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endpush
