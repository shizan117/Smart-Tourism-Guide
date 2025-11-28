@extends('frontend.layouts.master')

@section('title','Smart Tourism Guide')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Discover Amazing Places</h1>
        <p class="lead mb-4">Plan your perfect trip with our smart tourism guide system</p>

        <!-- Search Form -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Search for destinations, attractions...">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Why Choose Our Platform</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon">
                    <i class="fas fa-map"></i>
                </div>
                <h4>Smart Itinerary Builder</h4>
                <p>Create personalized trip plans with our easy-to-use itinerary builder.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h4>Cost Calculator</h4>
                <p>Estimate your travel expenses accurately before you go.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon">
                    <i class="fas fa-download"></i>
                </div>
                <h4>Offline Guides</h4>
                <p>Download PDF guides to access information without internet.</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Spots Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Popular Tourist Spots</h2>
        <div class="row">
            <!-- Spot 1 -->
            <div class="col-md-4">
                <div class="card spot-card">
                    <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Mountain View">
                    <div class="card-body">
                        <h5 class="card-title">Mountain Paradise</h5>
                        <p class="card-text">Breathtaking views and hiking trails for nature lovers.</p>
                        <div class="mb-2">
                                <span class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </span>
                            <span class="ms-1">4.5 (128 reviews)</span>
                        </div>
                        <a href=" " class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Spot 2 -->
            <div class="col-md-4">
                <div class="card spot-card">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Beach View">
                    <div class="card-body">
                        <h5 class="card-title">Sunset Beach</h5>
                        <p class="card-text">Perfect for relaxation with golden sands and clear waters.</p>
                        <div class="mb-2">
                                <span class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                            <span class="ms-1">4.0 (95 reviews)</span>
                        </div>
                        <a href=" " class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Spot 3 -->
            <div class="col-md-4">
                <div class="card spot-card">
                    <img src="https://images.unsplash.com/photo-1549294413-26f195200c16?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="City View">
                    <div class="card-body">
                        <h5 class="card-title">Historic City Center</h5>
                        <p class="card-text">Explore ancient architecture and cultural heritage sites.</p>
                        <div class="mb-2">
                                <span class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            <span class="ms-1">5.0 (210 reviews)</span>
                        </div>
                        <a href=" " class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{route('spots.index')}}" class="btn btn-outline-primary">View All Spots</a>
        </div>
    </div>
</section>

<!-- Cost Calculator Preview -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Estimate Your Travel Costs</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cost-calculator">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="destination" class="form-label">Destination</label>
                                <select class="form-select" id="destination">
                                    <option selected>Select a destination</option>
                                    <option>Mountain Paradise</option>
                                    <option>Sunset Beach</option>
                                    <option>Historic City Center</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="travelers" class="form-label">Number of Travelers</label>
                                <input type="number" class="form-control" id="travelers" value="1" min="1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="days" class="form-label">Duration (Days)</label>
                                <input type="number" class="form-control" id="days" value="3" min="1">
                            </div>
                            <div class="col-md-6">
                                <label for="budget" class="form-label">Budget Level</label>
                                <select class="form-select" id="budget">
                                    <option>Budget</option>
                                    <option selected>Moderate</option>
                                    <option>Luxury</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary">Calculate Estimated Cost</button>
                        </div>
                    </form>
                    <div class="mt-4 text-center">
                        <h4>Estimated Cost: <span class="text-primary">$450</span></h4>
                        <p class="text-muted">This includes accommodation, meals, and local transportation</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{route('cost_calculator')}}" class="btn btn-outline-primary">Use Advanced Calculator</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Personalized Suggestions -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Personalized Suggestions For You</h2>
        <p class="mb-4">Based on your preferences and past activities</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://images.unsplash.com/photo-1578530332818-6ba53e3a1b4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Adventure Spot">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Adventure Park</h5>
                                <p class="card-text">Thrilling activities for adventure seekers.</p>
                                <small class="text-muted">Matches your interest in outdoor activities</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Cultural Museum">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cultural Museum</h5>
                                <p class="card-text">Explore local history and artifacts.</p>
                                <small class="text-muted">Based on your museum visits</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
