@extends('frontend.layouts.master')

@section('title','Plan')


@section('content')


    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold">Your Trip Plans</h1>
                    <p class="lead">Create, manage, and organize your perfect travel itineraries</p>
                    <a href="{{route('plan_creator')}}" class="btn btn-primary btn-lg mt-3">
                        <i class="fas fa-plus-circle me-2"></i>Create New Plan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Plans Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-2 mb-md-0">
                                <h5 class="card-title mb-0">My Trip Plans</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-wrap justify-content-md-end">
                                    <div class="btn-group me-2 mb-2" role="group">
                                        <input type="radio" class="btn-check" name="status-filter" id="all-plans" checked>
                                        <label class="btn btn-outline-primary" for="all-plans">All Plans</label>

                                        <input type="radio" class="btn-check" name="status-filter" id="planning">
                                        <label class="btn btn-outline-primary" for="planning">Planning</label>

                                        <input type="radio" class="btn-check" name="status-filter" id="active">
                                        <label class="btn btn-outline-primary" for="active">Active</label>

                                        <input type="radio" class="btn-check" name="status-filter" id="completed">
                                        <label class="btn btn-outline-primary" for="completed">Completed</label>
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select">
                                            <option>Sort by: Recent</option>
                                            <option>Sort by: Trip Date</option>
                                            <option>Sort by: Duration</option>
                                            <option>Sort by: Cost</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plans Grid -->
        <div class="row">
            <!-- Plan 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card plan-card">
                    <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Mountain Adventure">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Mountain Adventure</h5>
                            <span class="plan-status status-active">Active</span>
                        </div>
                        <p class="card-text">3-day hiking trip through mountain trails with camping overnight.</p>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small text-muted">
                                <span><i class="far fa-calendar me-1"></i> Jun 15-17, 2023</span>
                                <span><i class="far fa-user me-1"></i> 2 travelers</span>
                            </div>
                        </div>

                        <div class="plan-stats">
                            <div class="stat-item">
                                <div class="stat-value">3</div>
                                <div class="stat-label">Days</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">5</div>
                                <div class="stat-label">Spots</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">$420</div>
                                <div class="stat-label">Estimated</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{route('plan_details')}}" class="btn btn-primary btn-sm">View Details</a>
                            <a href="#" class="btn btn-outline-primary btn-sm ms-1"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm ms-1" title="Download PDF"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card plan-card">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Beach Vacation">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Beach Vacation</h5>
                            <span class="plan-status status-planning">Planning</span>
                        </div>
                        <p class="card-text">Relaxing 5-day beach getaway with water sports and local cuisine.</p>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small text-muted">
                                <span><i class="far fa-calendar me-1"></i> Aug 10-14, 2023</span>
                                <span><i class="far fa-user me-1"></i> 4 travelers</span>
                            </div>
                        </div>

                        <div class="plan-stats">
                            <div class="stat-item">
                                <div class="stat-value">5</div>
                                <div class="stat-label">Days</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">7</div>
                                <div class="stat-label">Spots</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">$850</div>
                                <div class="stat-label">Estimated</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{route('plan_details')}}" class="btn btn-primary btn-sm">View Details</a>
                            <a href="#" class="btn btn-outline-primary btn-sm ms-1"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm ms-1" title="Download PDF"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card plan-card">
                    <img src="https://images.unsplash.com/photo-1549294413-26f195200c16?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="City Exploration">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">City Exploration</h5>
                            <span class="plan-status status-completed">Completed</span>
                        </div>
                        <p class="card-text">2-day urban adventure exploring historical sites and local culture.</p>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small text-muted">
                                <span><i class="far fa-calendar me-1"></i> Apr 22-23, 2023</span>
                                <span><i class="far fa-user me-1"></i> 2 travelers</span>
                            </div>
                        </div>

                        <div class="plan-stats">
                            <div class="stat-item">
                                <div class="stat-value">2</div>
                                <div class="stat-label">Days</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">4</div>
                                <div class="stat-label">Spots</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">$280</div>
                                <div class="stat-label">Actual</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{route('plan_details')}}" class="btn btn-primary btn-sm">View Details</a>
                            <a href="#" class="btn btn-outline-primary btn-sm ms-1"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm ms-1" title="Download PDF"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card plan-card">
                    <img src="https://images.unsplash.com/photo-1578530332818-6ba53e3a1b4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Adventure Weekend">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Adventure Weekend</h5>
                            <span class="plan-status status-planning">Planning</span>
                        </div>
                        <p class="card-text">Weekend getaway with adventure sports and outdoor activities.</p>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small text-muted">
                                <span><i class="far fa-calendar me-1"></i> Sep 2-3, 2023</span>
                                <span><i class="far fa-user me-1"></i> 3 travelers</span>
                            </div>
                        </div>

                        <div class="plan-stats">
                            <div class="stat-item">
                                <div class="stat-value">2</div>
                                <div class="stat-label">Days</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">3</div>
                                <div class="stat-label">Spots</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">$320</div>
                                <div class="stat-label">Estimated</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{route('plan_details')}}" class="btn btn-primary btn-sm">View Details</a>
                            <a href="#" class="btn btn-outline-primary btn-sm ms-1"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm ms-1" title="Download PDF"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card plan-card">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Cultural Tour">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Cultural Tour</h5>
                            <span class="plan-status status-active">Active</span>
                        </div>
                        <p class="card-text">4-day immersion in local culture, museums, and historical landmarks.</p>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between small text-muted">
                                <span><i class="far fa-calendar me-1"></i> Jul 5-8, 2023</span>
                                <span><i class="far fa-user me-1"></i> 2 travelers</span>
                            </div>
                        </div>

                        <div class="plan-stats">
                            <div class="stat-item">
                                <div class="stat-value">4</div>
                                <div class="stat-label">Days</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">6</div>
                                <div class="stat-label">Spots</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">$610</div>
                                <div class="stat-label">Estimated</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{route('plan_details')}}" class="btn btn-primary btn-sm">View Details</a>
                            <a href="#" class="btn btn-outline-primary btn-sm ms-1"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm ms-1" title="Download PDF"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 6 - Create New Plan Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card plan-card border-dashed">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 400px;">
                        <div class="mb-3">
                            <i class="fas fa-plus-circle fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title">Create New Plan</h5>
                        <p class="card-text">Start building your perfect trip itinerary from scratch</p>
                        <a href="{{route('plan_creator')}}" class="btn btn-primary mt-2">Create Plan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sample Plan Details (for demonstration) -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Plan Details: Mountain Adventure</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="section-title">Itinerary</h5>

                                <!-- Day 1 -->
                                <div class="itinerary-day">
                                    <div class="day-header">
                                        <h6 class="mb-0">Day 1: Arrival and Initial Exploration</h6>
                                        <span class="badge bg-primary">June 15, 2023</span>
                                    </div>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <strong>9:00 AM</strong> - Arrive at Mountain Paradise base camp
                                        </div>
                                        <div class="timeline-item">
                                            <strong>10:30 AM</strong> - Begin hike on Green Trail (easy difficulty)
                                        </div>
                                        <div class="timeline-item">
                                            <strong>1:00 PM</strong> - Lunch at Summit Viewpoint
                                        </div>
                                        <div class="timeline-item">
                                            <strong>3:00 PM</strong> - Continue to Crystal Lake
                                        </div>
                                        <div class="timeline-item">
                                            <strong>6:00 PM</strong> - Set up camp and prepare dinner
                                        </div>
                                    </div>
                                </div>

                                <!-- Day 2 -->
                                <div class="itinerary-day">
                                    <div class="day-header">
                                        <h6 class="mb-0">Day 2: Advanced Trails and Exploration</h6>
                                        <span class="badge bg-primary">June 16, 2023</span>
                                    </div>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <strong>7:00 AM</strong> - Breakfast and pack up camp
                                        </div>
                                        <div class="timeline-item">
                                            <strong>8:30 AM</strong> - Begin advanced trail to Eagle's Peak
                                        </div>
                                        <div class="timeline-item">
                                            <strong>12:00 PM</strong> - Lunch at Eagle's Peak (highest point)
                                        </div>
                                        <div class="timeline-item">
                                            <strong>2:00 PM</strong> - Descend to Valley Campground
                                        </div>
                                        <div class="timeline-item">
                                            <strong>5:00 PM</strong> - Set up camp and free time
                                        </div>
                                    </div>
                                </div>

                                <!-- Day 3 -->
                                <div class="itinerary-day">
                                    <div class="day-header">
                                        <h6 class="mb-0">Day 3: Return and Departure</h6>
                                        <span class="badge bg-primary">June 17, 2023</span>
                                    </div>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <strong>8:00 AM</strong> - Breakfast and pack up
                                        </div>
                                        <div class="timeline-item">
                                            <strong>9:30 AM</strong> - Scenic route back to base camp
                                        </div>
                                        <div class="timeline-item">
                                            <strong>12:00 PM</strong> - Lunch at base camp
                                        </div>
                                        <div class="timeline-item">
                                            <strong>1:30 PM</strong> - Departure
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5 class="section-title">Cost Summary</h5>
                                <div class="cost-summary">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Transportation:</span>
                                            <strong>$120</strong>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 29%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Accommodation:</span>
                                            <strong>$60</strong>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 14%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Food & Drinks:</span>
                                            <strong>$150</strong>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 36%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Activities:</span>
                                            <strong>$50</strong>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 12%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Equipment:</span>
                                            <strong>$40</strong>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 10%"></div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total Estimated Cost:</span>
                                        <span class="text-primary">$420</span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h5 class="section-title">Included Spots</h5>
{{--                                    <div class="list-group">--}}
{{--                                        <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">--}}
{{--                                            Mountain Paradise--}}
{{--                                            <span class="badge bg-primary rounded-pill">Day 1</span>--}}
{{--                                        </a>--}}
{{--                                        <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">--}}
{{--                                            Crystal Lake--}}
{{--                                            <span class="badge bg-primary rounded-pill">Day 1</span>--}}
{{--                                        </a>--}}
{{--                                        <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">--}}
{{--                                            Eagle's Peak--}}
{{--                                            <span class="badge bg-primary rounded-pill">Day 2</span>--}}
{{--                                        </a>--}}
{{--                                        <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">--}}
{{--                                            Valley Campground--}}
{{--                                            <span class="badge bg-primary rounded-pill">Day 2</span>--}}
{{--                                        </a>--}}
{{--                                        <a href=" " class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">--}}
{{--                                            Scenic Route Trail--}}
{{--                                            <span class="badge bg-primary rounded-pill">Day 3</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="mt-4 d-grid gap-2">
                                    <a href="{{route('plan_creator')}}?edit=1" class="btn btn-primary">
                                        <i class="far fa-edit me-1"></i>Edit Plan
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-download me-1"></i>Download PDF Guide
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary">
                                        <i class="fas fa-share-alt me-1"></i>Share Plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
