@extends('frontend.layouts.master')

@section('title', $spot->name . ' - Smart Tourism Bangladesh')

@section('content')
    <!-- Page Header -->
    <section class="page-header bg-gradient-primary text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('spots.index') }}" class="text-white-50">Tourist Spots</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $spot->name }}</li>
                </ol>
            </nav>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-2">{{ $spot->name }}</h1>
                    <div class="d-flex flex-wrap gap-3 mb-3">
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="fas fa-tag me-2"></i>{{ $spot->category }}
                        </span>
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="fas fa-map-marker-alt me-2"></i>{{ $spot->location }}
                        </span>
                        @if($spot->is_featured)
                            <span class="badge bg-warning px-3 py-2">
                            <i class="fas fa-star me-2"></i>Featured
                        </span>
                        @endif
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="star-rating me-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $spot->rating ? 'fas' : ($i - 0.5 <= $spot->rating ? 'fas fa-star-half-alt' : 'far') }} fa-star"></i>
                            @endfor
                        </div>
                        <span class="me-3">{{ number_format($spot->rating, 1) }} ({{ $spot->review_count }} reviews)</span>
                        <span><i class="fas fa-eye me-1"></i> {{ $spot->view_count }} views</span>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="btn-group mt-3 mt-md-0">
                        <a href="{{ route('plan_creator') }}?spot={{ $spot->id }}" class="btn btn-light px-4">
                            <i class="fas fa-plus-circle me-2"></i>Add to Plan
                        </a>
                        <button class="btn btn-outline-light px-4">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Spot Details Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Spot Image Gallery -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-0">
                        <div class="spot-gallery">
                            <img src="{{ $spot->image ? asset('storage/' . $spot->image) : 'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80' }}"
                                 class="img-fluid rounded-top" alt="{{ $spot->name }}" style="width: 100%; height: 400px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Spot Description -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h3 class="fw-bold mb-0"><i class="fas fa-info-circle text-primary me-2"></i>About This Place</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead">{{ $spot->description }}</p>

                        @if($spot->highlights)
                            <div class="mt-4">
                                <h5 class="fw-bold mb-3">Key Highlights</h5>
                                <div class="row">
                                    @foreach(explode(',', $spot->highlights) as $highlight)
                                        <div class="col-md-6 mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            {{ trim($highlight) }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Location & Map -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h3 class="fw-bold mb-0"><i class="fas fa-map-marked-alt text-primary me-2"></i>Location & Directions</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="fw-semibold mb-3">Location Details</h5>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt text-danger me-3 fs-5"></i>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Address</h6>
                                        <p class="mb-0">{{ $spot->location }}</p>
                                    </div>
                                </div>

                                @if($spot->opening_hours)
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-clock text-warning me-3 fs-5"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Opening Hours</h6>
                                            <p class="mb-0">{{ $spot->opening_hours }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="d-flex align-items-center">
                                    <i class="fas fa-ticket-alt text-success me-3 fs-5"></i>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Entry Fee</h6>
                                        <p class="mb-0 fw-bold {{ $spot->entry_fee == 0 ? 'text-success' : 'text-primary' }}">
                                            {{ $spot->entry_fee == 0 ? 'Free Entry' : '৳' . number_format($spot->entry_fee) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Simple Map Placeholder -->
                                <div class="map-placeholder bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <div class="text-center">
                                        <i class="fas fa-map text-muted fa-2x mb-2"></i>
                                        <p class="text-muted mb-0">Map View</p>
                                        <small class="text-muted">Location: {{ $spot->location }}</small>
                                    </div>
                                </div>
                                @if($spot->latitude && $spot->longitude)
                                    <div class="text-center mt-2">
                                        <a href="https://maps.google.com/?q={{ $spot->latitude }},{{ $spot->longitude }}"
                                           target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-external-link-alt me-1"></i>Open in Google Maps
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h3 class="fw-bold mb-0"><i class="fas fa-star text-warning me-2"></i>Visitor Reviews</h3>
                    </div>
                    <div class="card-body">
                        @if($spot->review_count > 0)
                            <div class="text-center mb-4">
                                <div class="display-4 fw-bold text-primary">{{ number_format($spot->rating, 1) }}</div>
                                <div class="star-rating mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $spot->rating ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                                <p class="text-muted">Based on {{ $spot->review_count }} reviews</p>
                            </div>

                            <!-- Sample Reviews -->
                            <div class="review-list">
                                <div class="review-item border-bottom pb-4 mb-4">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="fw-bold mb-1">Amazing Experience!</h6>
                                            <div class="star-rating small">
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <p class="mb-2">One of the most beautiful places I've visited in Bangladesh. The scenery was breathtaking and the staff were very helpful.</p>
                                    <small class="text-muted">- Traveler123</small>
                                </div>

                                <div class="review-item border-bottom pb-4 mb-4">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="fw-bold mb-1">Great for Family</h6>
                                            <div class="star-rating small">
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <small class="text-muted">1 week ago</small>
                                    </div>
                                    <p class="mb-2">Perfect spot for family outings. Kids loved it and there were plenty of activities for everyone.</p>
                                    <small class="text-muted">- FamilyTraveler</small>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-comment-slash fa-3x text-muted mb-3"></i>
                                <h5>No Reviews Yet</h5>
                                <p class="text-muted">Be the first to review this spot!</p>
                                <button class="btn btn-primary">Write a Review</button>
                            </div>
                    @endif

                    <!-- Add Review Form (Collapsed by default) -->
                        <div class="add-review mt-4">
                            <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#reviewForm">
                                <i class="fas fa-pen me-2"></i>Write a Review
                            </button>
                            <div class="collapse mt-3" id="reviewForm">
                                <div class="card card-body">
                                    <h6 class="fw-bold mb-3">Share Your Experience</h6>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Your Rating</label>
                                            <div class="star-rating large" id="ratingStars">
                                                <i class="far fa-star" data-rating="1"></i>
                                                <i class="far fa-star" data-rating="2"></i>
                                                <i class="far fa-star" data-rating="3"></i>
                                                <i class="far fa-star" data-rating="4"></i>
                                                <i class="far fa-star" data-rating="5"></i>
                                            </div>
                                            <input type="hidden" name="rating" id="selectedRating">
                                        </div>
                                        <div class="mb-3">
                                            <label for="reviewTitle" class="form-label">Review Title</label>
                                            <input type="text" class="form-control" id="reviewTitle" placeholder="Summarize your experience">
                                        </div>
                                        <div class="mb-3">
                                            <label for="reviewText" class="form-label">Your Review</label>
                                            <textarea class="form-control" id="reviewText" rows="4" placeholder="Share details of your experience..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0">Plan Your Visit</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('plan_creator') }}?spot={{ $spot->id }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Add to Trip Plan
                            </a>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-directions me-2"></i>Get Directions
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="far fa-heart me-2"></i>Save to Favorites
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-share-alt me-2"></i>Share This Spot
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Cost Calculator -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-calculator text-success me-2"></i>Visit Cost Estimate</h5>
                    </div>
                    <div class="card-body">
                        <div class="cost-breakdown">
                            <div class="cost-item d-flex justify-content-between mb-2">
                                <span>Entry Fee:</span>
                                <strong>{{ $spot->entry_fee == 0 ? 'Free' : '৳' . number_format($spot->entry_fee) }}</strong>
                            </div>
                            <div class="cost-item d-flex justify-content-between mb-2">
                                <span>Transport (approx):</span>
                                <strong>৳ 200-500</strong>
                            </div>
                            <div class="cost-item d-flex justify-content-between mb-2">
                                <span>Food & Drinks:</span>
                                <strong>৳ 300-800</strong>
                            </div>
                            <hr>
                            <div class="cost-item d-flex justify-content-between fw-bold">
                                <span>Total Estimate:</span>
                                <span class="text-primary">৳ 500-1,300</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('cost_calculator') }}?spot={{ $spot->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-calculator me-1"></i>Detailed Calculator
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Similar Spots -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-compass text-info me-2"></i>Similar Spots</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $similarSpots = \App\Models\Spot::where('category', $spot->category)
                                ->where('id', '!=', $spot->id)
                                ->where('is_active', true)
                                ->limit(3)
                                ->get();
                        @endphp

                        @forelse($similarSpots as $similar)
                            <div class="similar-spot d-flex align-items-center mb-3 pb-3 border-bottom">
                                <img src="{{ $similar->image ? asset('storage/' . $similar->image) : 'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=60' }}"
                                     class="rounded me-3" width="60" height="60" alt="{{ $similar->name }}" style="object-fit: cover;">
                                <div>
                                    <h6 class="fw-semibold mb-1">{{ Str::limit($similar->name, 25) }}</h6>
                                    <div class="star-rating small mb-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="{{ $i <= $similar->rating ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor
                                    </div>
                                    <small class="text-muted">{{ $similar->location }}</small>
                                    <br>
                                    <a href="{{ route('spot_details', $similar) }}" class="btn btn-sm btn-outline-primary mt-1">View</a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-3">
                                <i class="fas fa-map-marker-alt fa-2x text-muted mb-2"></i>
                                <p class="text-muted mb-0">No similar spots found</p>
                            </div>
                        @endforelse

                        <div class="text-center mt-2">
                            <a href="{{ route('spots.index') }}?category={{ urlencode($spot->category) }}" class="btn btn-outline-primary btn-sm">
                                View All {{ $spot->category }} Spots
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2a9d8f 0%, #1d7870 100%);
        }

        .star-rating {
            color: #ffc107;
        }

        .star-rating.small {
            font-size: 0.875rem;
        }

        .star-rating.large {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .star-rating.large i {
            transition: color 0.2s;
        }

        .star-rating.large i:hover {
            color: #ffc107;
        }

        .spot-gallery {
            position: relative;
        }

        .map-placeholder {
            border: 2px dashed #dee2e6;
        }

        .similar-spot:last-child {
            border-bottom: none !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .cost-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .cost-item:last-child {
            border-bottom: none;
        }

        .review-item:last-child {
            border-bottom: none !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }

        .breadcrumb-item a {
            text-decoration: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Star rating functionality
            const stars = document.querySelectorAll('#ratingStars i');
            const selectedRating = document.getElementById('selectedRating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    selectedRating.value = rating;

                    stars.forEach(s => {
                        if (s.getAttribute('data-rating') <= rating) {
                            s.classList.remove('far');
                            s.classList.add('fas');
                        } else {
                            s.classList.remove('fas');
                            s.classList.add('far');
                        }
                    });
                });

                star.addEventListener('mouseover', function() {
                    const rating = this.getAttribute('data-rating');
                    stars.forEach(s => {
                        if (s.getAttribute('data-rating') <= rating) {
                            s.classList.add('fas');
                            s.classList.remove('far');
                        }
                    });
                });

                star.addEventListener('mouseout', function() {
                    const currentRating = selectedRating.value;
                    stars.forEach(s => {
                        if (!currentRating || s.getAttribute('data-rating') > currentRating) {
                            s.classList.remove('fas');
                            s.classList.add('far');
                        }
                    });
                });
            });

            // Share functionality
            document.querySelector('.btn-outline-primary[class*="fa-share-alt"]').addEventListener('click', function() {
                if (navigator.share) {
                    navigator.share({
                        title: '{{ $spot->name }}',
                        text: 'Check out this amazing tourist spot in Bangladesh!',
                        url: window.location.href,
                    })
                        .catch(console.error);
                } else {
                    // Fallback: copy to clipboard
                    navigator.clipboard.writeText(window.location.href).then(function() {
                        alert('Link copied to clipboard!');
                    });
                }
            });
        });
    </script>
@endpush
