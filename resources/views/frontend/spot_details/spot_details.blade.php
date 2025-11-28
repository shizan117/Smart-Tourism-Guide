@extends('frontend.layouts.master')

@section('title','Spot Details')


@section('content')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="badge bg-light text-dark mb-3">Nature & Parks</span>
                    <h1 class="display-4 fw-bold">Mountain Paradise</h1>
                    <p class="lead">Breathtaking views and hiking trails for nature lovers</p>
                    <div class="d-flex align-items-center mb-3">
                        <span class="star-rating me-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="me-3">4.5 (128 reviews)</span>
                        <span><i class="fas fa-map-marker-alt me-1"></i> 15 km from city center</span>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#cost-calculator" class="btn btn-primary">
                            <i class="fas fa-calculator me-1"></i> Estimate Cost
                        </a>
                        <a href="{{route('plan_creator')}}" class="btn btn-outline-light">
                            <i class="far fa-calendar-plus me-1"></i> Add to Trip Plan
                        </a>
                        <button class="btn btn-outline-light">
                            <i class="far fa-heart me-1"></i> Save to Favorites
                        </button>
                        <button class="btn btn-outline-light">
                            <i class="fas fa-download me-1"></i> Download Guide
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-4" id="spotDetailTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab">Photos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab">Location</button>
            </li>
        </ul>

        <div class="tab-content" id="spotDetailTabsContent">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="section-title">About Mountain Paradise</h3>
                        <p>Mountain Paradise offers some of the most spectacular views in the region. With well-maintained hiking trails suitable for all skill levels, this destination is perfect for nature enthusiasts, photographers, and families alike.</p>

                        <p>The area features diverse flora and fauna, with several lookout points that provide panoramic views of the surrounding valleys. During spring, the wildflower blooms create a colorful tapestry across the landscape, while autumn brings stunning foliage displays.</p>

                        <h5>Highlights</h5>
                        <ul>
                            <li>Multiple hiking trails ranging from easy walks to challenging climbs</li>
                            <li>Photography spots with breathtaking vistas</li>
                            <li>Guided nature walks available on weekends</li>
                            <li>Picnic areas with facilities</li>
                            <li>Wildlife observation opportunities</li>
                        </ul>

                        <h5>Best Time to Visit</h5>
                        <p>The park is open year-round, but the best times to visit are during spring (March-May) and autumn (September-November) when temperatures are mild and the scenery is at its most vibrant. Summer can be crowded, while winter offers snowy landscapes for those prepared for cold weather hiking.</p>

                        <h5>Facilities</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Free parking area</li>
                                    <li>Restrooms</li>
                                    <li>Picnic tables</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Information center</li>
                                    <li>Drinking water stations</li>
                                    <li>First aid station</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Quick Facts Card -->
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Quick Facts</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <strong>Entry Fee:</strong> <span class="text-success">Free</span>
                                </div>
                                <div class="mb-3">
                                    <strong>Opening Hours:</strong> 6:00 AM - 8:00 PM
                                </div>
                                <div class="mb-3">
                                    <strong>Recommended Visit Duration:</strong> 2-4 hours
                                </div>
                                <div class="mb-3">
                                    <strong>Pet Friendly:</strong> Yes (on leash)
                                </div>
                                <div class="mb-3">
                                    <strong>Family Friendly:</strong> Yes
                                </div>
                                <div class="mb-3">
                                    <strong>Wheelchair Access:</strong> Partial (main paths only)
                                </div>
                            </div>
                        </div>

                        <!-- Weather Widget -->
                        <div class="card mt-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Current Weather</h5>
                            </div>
                            <div class="card-body text-center">
                                <i class="fas fa-sun fa-3x text-warning mb-2"></i>
                                <h4>72°F</h4>
                                <p>Sunny • Perfect for hiking</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cost Calculator -->
                <div class="row mt-5" id="cost-calculator">
                    <div class="col-12">
                        <h3 class="section-title">Cost Estimation</h3>
                        <div class="cost-breakdown">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Estimated Costs for Your Visit</h5>
                                    <p>Based on 2 adults visiting for half a day</p>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Transportation (round trip):</span>
                                            <span>$15 - $25</span>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 30%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Food & Drinks:</span>
                                            <span>$20 - $40</span>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Equipment Rental (optional):</span>
                                            <span>$0 - $30</span>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 20%"></div>
                                        </div>
                                    </div>

                                    <div class="fw-bold mt-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Total Estimated Cost:</span>
                                            <span class="text-primary">$35 - $95</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Customize Your Estimate</h5>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Number of Travelers</label>
                                            <input type="number" class="form-control" value="2" min="1">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Visit Duration</label>
                                            <select class="form-select">
                                                <option>Half Day (2-4 hours)</option>
                                                <option>Full Day (5-8 hours)</option>
                                                <option>Multiple Days</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Transportation Type</label>
                                            <select class="form-select">
                                                <option>Public Transport</option>
                                                <option>Ride Share</option>
                                                <option>Rental Car</option>
                                                <option>Private Vehicle</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary w-100">Update Estimate</button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{route('cost_calculator')}}" class="btn btn-outline-primary">Use Advanced Calculator</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Tab -->
            <div class="tab-pane fade" id="gallery" role="tabpanel">
                <h3 class="section-title">Photo Gallery</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid gallery-img rounded" alt="Mountain View 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid gallery-img rounded" alt="Mountain View 2">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1464822759844-d150ae4d4dd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid gallery-img rounded" alt="Mountain View 3">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1464822759844-d150ae4d4dd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid gallery-img rounded" alt="Mountain View 4">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid gallery-img rounded" alt="Mountain View 5">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1464822759844-d150ae4d4dd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="img-fluid gallery-img rounded" alt="Mountain View 6">
                    </div>
                </div>
            </div>

            <!-- Reviews Tab -->
            <div class="tab-pane fade" id="reviews" role="tabpanel">
                <h3 class="section-title">Visitor Reviews</h3>

                <!-- Review Summary -->
                <div class="row mb-5">
                    <div class="col-md-4 text-center">
                        <h2 class="display-4 text-primary">4.5</h2>
                        <div class="star-rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p>Based on 128 reviews</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row align-items-center mb-2">
                            <div class="col-2 text-end">
                                <span>5 stars</span>
                            </div>
                            <div class="col-8">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>70%</span>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-2 text-end">
                                <span>4 stars</span>
                            </div>
                            <div class="col-8">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>20%</span>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-2 text-end">
                                <span>3 stars</span>
                            </div>
                            <div class="col-8">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 7%"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>7%</span>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-2 text-end">
                                <span>2 stars</span>
                            </div>
                            <div class="col-8">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 2%"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>2%</span>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-2 text-end">
                                <span>1 star</span>
                            </div>
                            <div class="col-8">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 1%"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>1%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Form -->
                <div class="card mb-5">
                    <div class="card-header">
                        <h5 class="mb-0">Write a Review</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Your Rating</label>
                                <div class="star-rating" id="rating-stars">
                                    <i class="far fa-star" data-rating="1"></i>
                                    <i class="far fa-star" data-rating="2"></i>
                                    <i class="far fa-star" data-rating="3"></i>
                                    <i class="far fa-star" data-rating="4"></i>
                                    <i class="far fa-star" data-rating="5"></i>
                                </div>
                                <input type="hidden" id="rating-value" name="rating" value="0">
                            </div>
                            <div class="mb-3">
                                <label for="review-title" class="form-label">Review Title</label>
                                <input type="text" class="form-control" id="review-title" placeholder="Summarize your experience">
                            </div>
                            <div class="mb-3">
                                <label for="review-text" class="form-label">Your Review</label>
                                <textarea class="form-control" id="review-text" rows="4" placeholder="Share details of your experience"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>

                <!-- Reviews List -->
                <h5>Recent Reviews</h5>

                <!-- Review 1 -->
                <div class="card review-card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="card-title">Breathtaking Views!</h6>
                            <span class="text-muted">2 days ago</span>
                        </div>
                        <div class="star-rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="card-text">The hiking trails were well maintained and the views from the summit were absolutely worth the climb. We went during sunrise and it was magical. Highly recommend for nature lovers!</p>
                        <div class="d-flex align-items-center">
                            <img src="https://i.pravatar.cc/40?img=1" class="rounded-circle me-2" alt="User Avatar">
                            <span>Sarah Johnson</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="card review-card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="card-title">Great Family Destination</h6>
                            <span class="text-muted">1 week ago</span>
                        </div>
                        <div class="star-rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p class="card-text">We visited with our two children (ages 8 and 10) and they loved it. The easier trails were perfect for them, and we all enjoyed the picnic areas. Will definitely return!</p>
                        <div class="d-flex align-items-center">
                            <img src="https://i.pravatar.cc/40?img=2" class="rounded-circle me-2" alt="User Avatar">
                            <span>Michael Chen</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="card review-card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="card-title">Perfect for Photography</h6>
                            <span class="text-muted">2 weeks ago</span>
                        </div>
                        <div class="star-rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="card-text">As a landscape photographer, I'm always looking for great locations. Mountain Paradise did not disappoint! The light during golden hour was spectacular. Already planning my next visit.</p>
                        <div class="d-flex align-items-center">
                            <img src="https://i.pravatar.cc/40?img=3" class="rounded-circle me-2" alt="User Avatar">
                            <span>Emma Rodriguez</span>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary">Load More Reviews</button>
                </div>
            </div>

            <!-- Location Tab -->
            <div class="tab-pane fade" id="location" role="tabpanel">
                <h3 class="section-title">Location & Directions</h3>
                <div class="row">
                    <div class="col-md-8">
                        <!-- Map -->
                        <div class="map-container mb-4">
                            <!-- In a real application, this would be an embedded Google Map -->
                            <div style="width:100%;height:100%;background-color:#e9ecef;display:flex;align-items:center;justify-content:center;">
                                <div class="text-center">
                                    <i class="fas fa-map-marked-alt fa-3x text-primary mb-2"></i>
                                    <p>Interactive Map Would Appear Here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Getting There</h5>
                            </div>
                            <div class="card-body">
                                <h6>By Car</h6>
                                <p>Take Highway 101 north for 15km, then follow signs for Mountain Paradise. Free parking available at the site.</p>

                                <h6>By Public Transport</h6>
                                <p>Take bus #42 from the city center to Mountain View Station, then transfer to shuttle bus #15 which runs hourly to the park entrance.</p>

                                <h6>Ride Sharing</h6>
                                <p>Estimated cost: $15-25 each way from city center. Use "Mountain Paradise Main Entrance" as your destination.</p>

                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm me-2">
                                        <i class="fas fa-directions me-1"></i> Get Directions
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-download me-1"></i> Download Map
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h5>Nearby Attractions</h5>
                        <div class="list-group">
                            <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Crystal Lake
                                <span class="badge bg-primary rounded-pill">5 km</span>
                            </a>
                            <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Forest Trail Park
                                <span class="badge bg-primary rounded-pill">8 km</span>
                            </a>
                            <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Valley Viewpoint
                                <span class="badge bg-primary rounded-pill">12 km</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Nearby Amenities</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Mountain Cafe
                                <span class="badge bg-success rounded-pill">0.5 km</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Adventure Gear Rental
                                <span class="badge bg-success rounded-pill">1 km</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                First Aid Station
                                <span class="badge bg-success rounded-pill">Onsite</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
