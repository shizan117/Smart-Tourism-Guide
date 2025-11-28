@extends('frontend.layouts.master')

@section('title', 'Plan Details - Mountain Adventure')

@section('content')
    <section class="page-header text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans') }}" class="text-white-50">My Plans</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Mountain Adventure</li>
                </ol>
            </nav>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-2">Mountain Adventure ⛰️</h1>
                    <div class="d-flex flex-wrap gap-3 mb-3">
                        <span class="badge bg-white text-primary px-3 py-2 fw-normal fs-6">
                            <i class="fas fa-calendar-alt me-2"></i>Jun 15 - 17, 2023
                        </span>
                        <span class="badge bg-white text-primary px-3 py-2 fw-normal fs-6">
                            <i class="fas fa-users me-2"></i>2 Travelers
                        </span>
                        <span class="badge bg-white text-primary px-3 py-2 fw-normal fs-6">
                            <i class="fas fa-tag me-2"></i>Adventure
                        </span>
                        <span class="badge bg-success-subtle text-success px-3 py-2 fw-normal fs-6">
                            <i class="fas fa-check-circle me-2"></i>Active
                        </span>
                    </div>
                    <p class="lead mb-0 text-white-75">3-day hiking trip through challenging mountain trails with camping overnight at scenic spots.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="btn-group mt-3 mt-md-0 shadow-lg" role="group">
                        <a href="{{ route('plan_creator') }}?edit=1" class="btn btn-warning text-dark px-4 fw-bold">
                            <i class="fas fa-edit me-2"></i>Edit Plan
                        </a>
                        <button class="btn btn-outline-light px-4">
                            <i class="fas fa-share-alt me-2"></i>Share
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h3 class="fw-bold mb-0 text-primary"><i class="fas fa-route me-2"></i>Trip Itinerary</h3>
                    </div>
                    <div class="card-body p-4">

                        <div class="itinerary-day-group mb-5 pb-3 border-bottom">
                            <h4 class="fw-bold mb-0">Day 1: Arrival and Initial Exploration</h4>
                            <p class="text-muted mb-4 small">June 15, 2023</p>

                            <div class="activity-list">
                                <div class="activity-item">
                                    <span class="activity-time">09:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <span>Arrive at <strong>Mountain Paradise base camp</strong></span>
                                        <p class="small text-muted mb-0">Meet with guide and gear check</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">10:30</span>
                                    <div class="activity-details">
                                        <i class="fas fa-hiking text-success me-2"></i>
                                        <span>Begin hike on Green Trail</span>
                                        <p class="small text-muted mb-0">Easy difficulty - 2.5 hours</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">13:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-utensils text-warning me-2"></i>
                                        <span>Lunch at Summit Viewpoint</span>
                                        <p class="small text-muted mb-0">Packed lunch with scenic views</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">15:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-water text-info me-2"></i>
                                        <span>Continue to Crystal Lake</span>
                                        <p class="small text-muted mb-0">Moderate hike - 3 hours</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">18:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-campground text-danger me-2"></i>
                                        <span>Set up camp near <strong>Crystal Lake</strong></span>
                                        <p class="small text-muted mb-0">Campfire cooking session</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itinerary-day-group mb-5 pb-3 border-bottom">
                            <h4 class="fw-bold mb-0">Day 2: Advanced Trails and Exploration</h4>
                            <p class="text-muted mb-4 small">June 16, 2023</p>

                            <div class="activity-list">
                                <div class="activity-item">
                                    <span class="activity-time">07:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-coffee text-dark me-2"></i>
                                        <span>Breakfast and pack up camp</span>
                                        <p class="small text-muted mb-0">Morning briefing</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">08:30</span>
                                    <div class="activity-details">
                                        <i class="fas fa-mountain text-success me-2"></i>
                                        <span>Begin advanced trail to <strong>Eagle's Peak</strong></span>
                                        <p class="small text-muted mb-0">Challenging route - 3.5 hours</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">12:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-utensils text-warning me-2"></i>
                                        <span>Lunch at Eagle's Peak</span>
                                        <p class="small text-muted mb-0">Highest point of the trip</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">14:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-hiking text-info me-2"></i>
                                        <span>Descend to <strong>Valley Campground</strong></span>
                                        <p class="small text-muted mb-0">Scenic descent - 3 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itinerary-day-group">
                            <h4 class="fw-bold mb-0">Day 3: Return and Departure</h4>
                            <p class="text-muted mb-4 small">June 17, 2023</p>

                            <div class="activity-list">
                                <div class="activity-item">
                                    <span class="activity-time">08:00</span>
                                    <div class="activity-details">
                                        <i class="fas fa-coffee text-dark me-2"></i>
                                        <span>Breakfast and pack up</span>
                                        <p class="small text-muted mb-0">Final camp breakdown</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-time">09:30</span>
                                    <div class="activity-details">
                                        <i class="fas fa-route text-info me-2"></i>
                                        <span>Scenic route back to base camp</span>
                                        <p class="small text-muted mb-0">Leisurely pace - 2.5 hours</p>
                                    </div>
                                </div>
                                <div class="activity-item last">
                                    <span class="activity-time">13:30</span>
                                    <div class="activity-details">
                                        <i class="fas fa-car text-primary me-2"></i>
                                        <span>Departure</span>
                                        <p class="small text-muted mb-0">Transport arranged</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h3 class="fw-bold mb-0 text-primary"><i class="fas fa-map-marked-alt me-2"></i>Included Locations</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="spot-card">
                                    <div class="spot-header d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0 text-primary">Mountain Paradise</h6>
                                        <span class="badge bg-primary-subtle text-primary">Day 1</span>
                                    </div>
                                    <p class="text-muted small">Base camp and starting point for the adventure</p>
                                    <a href="{{ route('spots.index') }}" class="btn btn-outline-primary btn-sm">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="spot-card">
                                    <div class="spot-header d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0 text-primary">Crystal Lake</h6>
                                        <span class="badge bg-primary-subtle text-primary">Day 1</span>
                                    </div>
                                    <p class="text-muted small">Pristine mountain lake with crystal clear waters</p>
                                    <a href="{{route('spots.index')}}" class="btn btn-outline-primary btn-sm">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="spot-card">
                                    <div class="spot-header d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0 text-primary">Eagle's Peak</h6>
                                        <span class="badge bg-primary-subtle text-primary">Day 2</span>
                                    </div>
                                    <p class="text-muted small">Highest point with breathtaking panoramic views</p>
                                    <a href="{{route('spots.index')}}" class="btn btn-outline-primary btn-sm">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="spot-card">
                                    <div class="spot-header d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0 text-primary">Valley Campground</h6>
                                        <span class="badge bg-primary-subtle text-primary">Day 2</span>
                                    </div>
                                    <p class="text-muted small">Secluded camping spot in the valley</p>
                                    <a href="{{route('spots.index')}}" class="btn btn-outline-primary btn-sm">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0 text-primary"><i class="fas fa-chart-pie me-2"></i>Budget Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="total-budget text-center mb-4 border-bottom pb-3">
                            <h3 class="fw-bold display-6 text-success">$420</h3>
                            <p class="text-muted fw-semibold mb-0">Total Estimated Cost</p>
                        </div>

                        <div class="budget-breakdown">
                            <div class="budget-item mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="small">Transportation</span>
                                    <span class="fw-bold small">$120</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="budget-item mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="small">Accommodation (Camping)</span>
                                    <span class="fw-bold small">$60</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 14%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="budget-item mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="small">Food & Drinks</span>
                                    <span class="fw-bold small">$150</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 36%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="budget-item mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="small">Activities/Permits</span>
                                    <span class="fw-bold small">$50</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="budget-item mb-0">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="small">Equipment Rental</span>
                                    <span class="fw-bold small">$40</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0 text-primary">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg">
                                <i class="fas fa-download me-2"></i>Export Plan (PDF/GPX)
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-print me-2"></i>Print Itinerary
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-calendar-plus me-2"></i>Add to Calendar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0 text-primary"><i class="fas fa-exclamation-circle me-2"></i>Important Notes</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item d-flex align-items-start border-0 px-0">
                                <i class="fas fa-hiking text-success mt-1 me-2 flex-shrink-0"></i>
                                <span>Moderate to <strong>high fitness level</strong> required for Day 2 trail.</span>
                            </li>
                            <li class="list-group-item d-flex align-items-start border-0 px-0">
                                <i class="fas fa-thermometer-half text-warning mt-1 me-2 flex-shrink-0"></i>
                                <span>Check <strong>local weather forecast</strong> for mountain conditions before departure.</span>
                            </li>
                            <li class="list-group-item d-flex align-items-start border-0 px-0">
                                <i class="fas fa-suitcase text-info mt-1 me-2 flex-shrink-0"></i>
                                <span><strong>Pack appropriate gear</strong>, including headlamps and emergency kit.</span>
                            </li>
                            <li class="list-group-item d-flex align-items-start border-0 px-0">
                                <i class="fas fa-car text-primary mt-1 me-2 flex-shrink-0"></i>
                                <span>Transportation to Mountain Paradise base camp is **not included**.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Define primary color variables */
        :root {
            --bs-primary: #2a9d8f;
            --bs-primary-dark: #1d7870;
            --bs-primary-light: #2a9d8f33; /* For subtle backgrounds */
        }

        .page-header {
            background: linear-gradient(135deg, var(--bs-primary) 0%, var(--bs-primary-dark) 100%);
        }

        .text-white-75 {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        .bg-success-subtle {
            background-color: #d1e7dd !important; /* Light green */
        }

        .badge.bg-primary-subtle {
            background-color: var(--bs-primary-light) !important;
            color: var(--bs-primary) !important;
        }

        .btn-warning {
            color: #343a40 !important;
        }

        /* --- CORRECTED ITINERARY STYLES --- */

        /* Remove timeline structure, rely on clear grouping and alignment */
        .activity-list {
            padding-left: 0; /* Remove default list padding */
            list-style: none; /* Ensure no bullets */
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px; /* Clean vertical spacing */
            padding-bottom: 15px;
            border-bottom: 1px dashed #e9ecef; /* Subtle visual separation */
        }

        .activity-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .activity-time {
            flex: 0 0 60px; /* Fixed width for time */
            font-weight: 700;
            color: var(--bs-primary-dark); /* Time stands out */
            font-size: 0.95rem;
            margin-top: 2px;
        }

        .activity-details {
            flex: 1;
        }

        .activity-details i {
            font-size: 1.1rem;
            width: 20px; /* Fixed width for icon to ensure consistent alignment of text */
            text-align: center;
        }

        .itinerary-day-group:last-child {
            border-bottom: none !important;
        }

        /* --- Other Styles --- */
        .spot-card {
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.2s;
            background-color: #fff;
        }

        .spot-card:hover {
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            border-color: var(--bs-primary);
        }

        .list-group-item i {
            font-size: 1.1rem;
            padding-top: 2px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Print functionality
            document.querySelector('.btn-outline-primary[class*="fa-print"]').addEventListener('click', function() {
                window.print();
            });

            // Export functionality
            document.querySelector('.btn-primary[class*="fa-download"]').addEventListener('click', function() {
                alert('Plan successfully generated! (This would trigger PDF/GPX download in a real app).');
            });

            // Add to calendar functionality
            document.querySelector('.btn-outline-primary[class*="fa-calendar-plus"]').addEventListener('click', function() {
                alert('A calendar invite (ICS file) would be generated and downloaded here!');
            });
        });
    </script>
@endpush
