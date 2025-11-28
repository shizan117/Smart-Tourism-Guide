@extends('frontend.layouts.master')

@section('title','Plan Creator')

@section('content')



    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold">Create Your Trip Plan</h1>
                    <p class="lead">Drag and drop spots to build your perfect itinerary</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Plan Basic Info -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Plan Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="plan-name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="plan-name" placeholder="e.g., Summer Beach Vacation">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="plan-destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="plan-destination" placeholder="e.g., Coastal City">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="start-date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start-date">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end-date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end-date">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="travelers" class="form-label">Number of Travelers</label>
                        <input type="number" class="form-control" id="travelers" min="1" value="1">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="plan-description" class="form-label">Description (Optional)</label>
                        <textarea class="form-control" id="plan-description" rows="2" placeholder="Brief description of your trip plan"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plan Creator Interface -->
        <div class="plan-creator-container">
            <!-- Spots Panel -->
            <div class="spots-panel">
                <h5 class="section-title">Available Spots</h5>

                <!-- Search and Filter -->
                <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search spots...">
                    <i class="fas fa-search"></i>
                </div>

                <div class="category-filter">
                    <span class="badge category-badge bg-primary">All</span>
                    <span class="badge category-badge bg-secondary">Nature</span>
                    <span class="badge category-badge bg-success">Beach</span>
                    <span class="badge category-badge bg-info">Historical</span>
                    <span class="badge category-badge bg-warning">Adventure</span>
                    <span class="badge category-badge bg-danger">Museum</span>
                </div>

                <!-- Spots List -->
                <div id="spots-list">
                    <div class="spot-item" data-id="1" data-cost="0">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Mountain Paradise">
                            <div>
                                <h6 class="mb-0">Mountain Paradise</h6>
                                <small class="text-muted">Nature • Free Entry</small>
                            </div>
                        </div>
                    </div>

                    <div class="spot-item" data-id="2" data-cost="15">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1549294413-26f195200c16?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Historic City Center">
                            <div>
                                <h6 class="mb-0">Historic City Center</h6>
                                <small class="text-muted">Historical • $15 Entry</small>
                            </div>
                        </div>
                    </div>

                    <div class="spot-item" data-id="3" data-cost="0">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Sunset Beach">
                            <div>
                                <h6 class="mb-0">Sunset Beach</h6>
                                <small class="text-muted">Beach • Free Entry</small>
                            </div>
                        </div>
                    </div>

                    <div class="spot-item" data-id="4" data-cost="25">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1578530332818-6ba53e3a1b4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Adventure Park">
                            <div>
                                <h6 class="mb-0">Adventure Park</h6>
                                <small class="text-muted">Adventure • $25 Entry</small>
                            </div>
                        </div>
                    </div>

                    <div class="spot-item" data-id="5" data-cost="12">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Cultural Museum">
                            <div>
                                <h6 class="mb-0">Cultural Museum</h6>
                                <small class="text-muted">Museum • $12 Entry</small>
                            </div>
                        </div>
                    </div>

                    <div class="spot-item" data-id="6" data-cost="0">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Botanical Gardens">
                            <div>
                                <h6 class="mb-0">Botanical Gardens</h6>
                                <small class="text-muted">Nature • Free Entry</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Itinerary Panel -->
            <div class="itinerary-panel">
                <h5 class="section-title">Your Itinerary</h5>

                <!-- Days Navigation -->
                <div class="d-flex mb-3 overflow-auto">
                    <button class="btn btn-outline-primary me-2 day-nav active" data-day="1">Day 1</button>
                    <button class="btn btn-outline-primary me-2 day-nav" data-day="2">Day 2</button>
                    <button class="btn btn-outline-primary me-2 day-nav" data-day="3">Day 3</button>
                    <button class="btn btn-outline-secondary" id="add-day-btn"><i class="fas fa-plus"></i> Add Day</button>
                </div>

                <!-- Day 1 Content -->
                <div class="day-content" id="day-1">
                    <div class="day-container ui-sortable">
                        <div class="day-header">
                            <h6 class="mb-0">Day 1: <input type="date" class="form-control form-control-sm d-inline-block w-auto"></h6>
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Remove Day</button>
                        </div>

                        <div class="empty-state" id="day-1-empty">
                            <i class="fas fa-arrow-left"></i>
                            <p>Drag spots from the left panel to build your itinerary</p>
                        </div>

                        <div class="timeline-items" id="day-1-items">
                            <!-- Items will be added here via drag and drop -->
                        </div>
                    </div>
                </div>

                <!-- Day 2 Content (hidden by default) -->
                <div class="day-content d-none" id="day-2">
                    <div class="day-container ui-sortable">
                        <div class="day-header">
                            <h6 class="mb-0">Day 2: <input type="date" class="form-control form-control-sm d-inline-block w-auto"></h6>
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Remove Day</button>
                        </div>

                        <div class="empty-state" id="day-2-empty">
                            <i class="fas fa-arrow-left"></i>
                            <p>Drag spots from the left panel to build your itinerary</p>
                        </div>

                        <div class="timeline-items" id="day-2-items">
                            <!-- Items will be added here via drag and drop -->
                        </div>
                    </div>
                </div>

                <!-- Day 3 Content (hidden by default) -->
                <div class="day-content d-none" id="day-3">
                    <div class="day-container ui-sortable">
                        <div class="day-header">
                            <h6 class="mb-0">Day 3: <input type="date" class="form-control form-control-sm d-inline-block w-auto"></h6>
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Remove Day</button>
                        </div>

                        <div class="empty-state" id="day-3-empty">
                            <i class="fas fa-arrow-left"></i>
                            <p>Drag spots from the left panel to build your itinerary</p>
                        </div>

                        <div class="timeline-items" id="day-3-items">
                            <!-- Items will be added here via drag and drop -->
                        </div>
                    </div>
                </div>

                <!-- Cost Summary -->
                <div class="cost-summary">
                    <h6>Cost Estimation</h6>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Entry Fees:</span>
                            <strong id="entry-fees">$0</strong>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Transportation:</span>
                            <strong id="transportation-cost">$0</strong>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Food & Accommodation:</span>
                            <strong id="food-accommodation">$0</strong>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total Estimated Cost:</span>
                        <span class="text-primary" id="total-cost">$0</span>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#costCalculatorModal">
                            <i class="fas fa-calculator me-1"></i> Detailed Cost Calculator
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-primary flex-fill">
                        <i class="fas fa-save me-1"></i> Save Plan
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-download me-1"></i> Download PDF
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-share-alt me-1"></i> Share
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cost Calculator Modal -->
    <div class="modal fade" id="costCalculatorModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detailed Cost Calculator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Transportation Cost</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="transportation-input" value="0" min="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Accommodation Cost (per night)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="accommodation-input" value="0" min="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Food Budget (per day)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="food-input" value="0" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Activities Budget</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="activities-input" value="0" min="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Miscellaneous Expenses</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="misc-input" value="0" min="0">
                                </div>
                            </div>

                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6>Estimated Total</h6>
                                    <h3 class="text-primary" id="modal-total-cost">$0</h3>
                                    <small class="text-muted">Based on your current itinerary and inputs</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="apply-costs">Apply to Plan</button>
                </div>
            </div>
        </div>
    </div>


@endsection
