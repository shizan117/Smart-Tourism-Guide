@extends('frontend.layouts.master')

@section('title', 'Cost Calculator - Smart Tourism Bangladesh')

@section('content')
    <!-- Page Header -->
    <section class="page-header bg-gradient-bangladesh text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-5 fw-bold mb-3">Bangladesh Travel Cost Calculator 🇧🇩</h1>
                    <p class="lead">Plan the estimated cost of your trip to Bangladesh</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="fas fa-taka-sign me-2"></i>BDT Currency
                        </span>
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="fas fa-map-marker-alt me-2"></i>Bangladesh Regions
                        </span>
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="fas fa-clock me-2"></i>Real-time Calculation
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calculator Section -->
    <div class="container py-5">
        <div class="row">
            <!-- Calculator Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-4">
                        <h3 class="fw-bold mb-0 text-center">
                            <i class="fas fa-calculator text-primary me-2"></i>
                            Trip Calculator
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <form id="costCalculatorForm">
                            <!-- Basic Information -->
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Trip Type <span class="text-danger">*</span></label>
                                    <select class="form-select" id="tripType" required>
                                        <option value="">Select Trip Type</option>
                                        <option value="budget">Budget Trip</option>
                                        <option value="standard">Standard Trip</option>
                                        <option value="luxury">Luxury Trip</option>
                                        <option value="business">Business Trip</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Region <span class="text-danger">*</span></label>
                                    <select class="form-select" id="region" required>
                                        <option value="">Select Region</option>
                                        <option value="dhaka">Dhaka Division</option>
                                        <option value="chattogram">Chattogram Division</option>
                                        <option value="sylhet">Sylhet Division</option>
                                        <option value="rajshahi">Rajshahi Division</option>
                                        <option value="khulna">Khulna Division</option>
                                        <option value="barishal">Barishal Division</option>
                                        <option value="rangpur">Rangpur Division</option>
                                        <option value="mymensingh">Mymensingh Division</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Duration & Travelers -->
                            <div class="row mb-4">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Number of Trip Days <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="days" min="1" max="30" value="3" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Number of Travelers <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="travelers" min="1" max="10" value="2" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Season</label>
                                    <select class="form-select" id="season">
                                        <option value="normal">Normal Season</option>
                                        <option value="peak">Peak Season (Winter)</option>
                                        <option value="offpeak">Off-Peak Season</option>
                                        <option value="festival">Festival Season</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Accommodation -->
                            <div class="cost-section mb-4">
                                <h5 class="section-title mb-3">
                                    <i class="fas fa-hotel text-primary me-2"></i>Accommodation Cost
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Hotel Category</label>
                                        <select class="form-select" id="hotelCategory">
                                            <option value="budget">Budget Hotel (BDT 800-1,500/Night)</option>
                                            <option value="standard">Standard Hotel (BDT 1,500-3,000/Night)</option>
                                            <option value="comfort">Comfort Hotel (BDT 3,000-5,000/Night)</option>
                                            <option value="luxury">Luxury Hotel (BDT 5,000+/Night)</option>
                                            <option value="guesthouse">Guest House (BDT 500-1,000/Night)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Number of Rooms</label>
                                        <input type="number" class="form-control" id="rooms" min="1" max="5" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Transportation -->
                            <div class="cost-section mb-4">
                                <h5 class="section-title mb-3">
                                    <i class="fas fa-bus text-success me-2"></i>Transportation Cost
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Main Transport</label>
                                        <select class="form-select" id="transportType">
                                            <option value="bus">Bus</option>
                                            <option value="train">Train</option>
                                            <option value="air">Air</option>
                                            <option value="private">Private Car</option>
                                            <option value="cng">CNG/Auto</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Local Transport</label>
                                        <select class="form-select" id="localTransport">
                                            <option value="rickshaw">Rickshaw/Auto</option>
                                            <option value="taxi">Taxi/Rideshare</option>
                                            <option value="rental">Bike/Car Rental</option>
                                            <option value="walking">Walking/Public Bus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Food & Activities -->
                            <div class="cost-section mb-4">
                                <h5 class="section-title mb-3">
                                    <i class="fas fa-utensils text-warning me-2"></i>Food & Activities
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Food Type</label>
                                        <select class="form-select" id="foodType">
                                            <option value="local">Local Restaurant (BDT 200-400/Meal)</option>
                                            <option value="mixed">Mixed (BDT 300-600/Meal)</option>
                                            <option value="restaurant">Restaurant (BDT 500-1,000/Meal)</option>
                                            <option value="luxury">Fine Dining (BDT 800+/Meal)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Attraction Entry Fee</label>
                                        <select class="form-select" id="attractionFees">
                                            <option value="low">Low (BDT 20-100/Person)</option>
                                            <option value="medium">Medium (BDT 50-200/Person)</option>
                                            <option value="high">High (BDT 100-500/Person)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Costs -->
                            <div class="cost-section mb-4">
                                <h5 class="section-title mb-3">
                                    <i class="fas fa-plus-circle text-info me-2"></i>Additional Costs
                                </h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shopping" value="true">
                                            <label class="form-check-label" for="shopping">
                                                Shopping Budget (BDT 500-2,000)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="guide" value="true">
                                            <label class="form-check-label" for="guide">
                                                Guide Service (BDT 500-1,500/Day)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="emergency" value="true" checked>
                                            <label class="form-check-label" for="emergency">
                                                Emergency Fund (BDT 1,000)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-calculator me-2"></i>Calculate Cost
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Results Sidebar -->
            <div class="col-lg-4">
                <!-- Cost Summary -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0 text-center">
                            <i class="fas fa-file-invoice-dollar text-success me-2"></i>
                            Cost Summary
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="total-cost">
                                <h2 class="fw-bold text-primary" id="totalCost">৳ 0</h2>
                                <p class="text-muted">Total Estimated Cost</p>
                            </div>
                            <div class="cost-per-person">
                                <h4 class="fw-semibold text-success" id="costPerPerson">৳ 0</h4>
                                <p class="text-muted small">Cost Per Person</p>
                            </div>
                        </div>

                        <div class="cost-breakdown">
                            <div class="breakdown-item d-flex justify-content-between mb-2">
                                <span>Accommodation:</span>
                                <strong id="accommodationCost">৳ 0</strong>
                            </div>
                            <div class="breakdown-item d-flex justify-content-between mb-2">
                                <span>Transportation:</span>
                                <strong id="transportationCost">৳ 0</strong>
                            </div>
                            <div class="breakdown-item d-flex justify-content-between mb-2">
                                <span>Food:</span>
                                <strong id="foodCost">৳ 0</strong>
                            </div>
                            <div class="breakdown-item d-flex justify-content-between mb-2">
                                <span>Entry Fees:</span>
                                <strong id="attractionCost">৳ 0</strong>
                            </div>
                            <div class="breakdown-item d-flex justify-content-between mb-2">
                                <span>Additional:</span>
                                <strong id="additionalCost">৳ 0</strong>
                            </div>
                            <hr>
                            <div class="breakdown-item d-flex justify-content-between fw-bold">
                                <span>Total:</span>
                                <span class="text-primary" id="finalTotalCost">৳ 0</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="budget-category mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small>Accommodation</small>
                                    <small id="accommodationPercent">0%</small>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-success" id="accommodationBar" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="budget-category mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small>Transportation</small>
                                    <small id="transportationPercent">0%</small>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-info" id="transportationBar" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="budget-category mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small>Food</small>
                                    <small id="foodPercent">0%</small>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" id="foodBar" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="budget-category">
                                <div class="d-flex justify-content-between mb-1">
                                    <small>Other</small>
                                    <small id="otherPercent">0%</small>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-purple" id="otherBar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Money Saving Tips -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            Money Saving Tips
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="tips-list">
                            <div class="tip-item d-flex mb-3">
                                <i class="fas fa-bus text-success me-3 mt-1"></i>
                                <div>
                                    <h6 class="fw-semibold mb-1">Use Local Transport</h6>
                                    <p class="small text-muted mb-0">Travel by bus or train to significantly reduce costs.</p>
                                </div>
                            </div>
                            <div class="tip-item d-flex mb-3">
                                <i class="fas fa-utensils text-warning me-3 mt-1"></i>
                                <div>
                                    <h6 class="fw-semibold mb-1">Eat Local Cuisine</h6>
                                    <p class="small text-muted mb-0">Eating at local restaurants is much more affordable than tourist spots.</p>
                                </div>
                            </div>
                            <div class="tip-item d-flex">
                                <i class="fas fa-hotel text-primary me-3 mt-1"></i>
                                <div>
                                    <h6 class="fw-semibold mb-1">Travel in Off-Season</h6>
                                    <p class="small text-muted mb-0">Avoid peak seasons to get lower prices on accommodation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .bg-gradient-bangladesh {
            background: linear-gradient(135deg, #006a4e 0%, #f42a41 100%);
        }

        .cost-section {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #2a9d8f;
        }

        .section-title {
            color: #2a9d8f;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .total-cost h2 {
            font-size: 2.5rem;
        }

        .cost-per-person h4 {
            font-size: 1.5rem;
        }

        .breakdown-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .breakdown-item:last-child {
            border-bottom: none;
        }

        .bg-purple {
            background-color: #6f42c1 !important;
        }

        .tip-item {
            padding: 0.5rem;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .tip-item:hover {
            background-color: #f8f9fa;
        }

        .form-check-label {
            font-weight: normal;
        }

        .badge {
            font-size: 0.8rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('costCalculatorForm');
            // BDT Cost data (min/max range per unit for calculations)
            const costData = {
                accommodation: {
                    budget: { min: 800, max: 1500 },
                    standard: { min: 1500, max: 3000 },
                    comfort: { min: 3000, max: 5000 },
                    luxury: { min: 5000, max: 10000 },
                    guesthouse: { min: 500, max: 1000 }
                },
                food: {
                    local: { min: 200, max: 400 }, // per person per meal
                    mixed: { min: 300, max: 600 },
                    restaurant: { min: 500, max: 1000 },
                    luxury: { min: 800, max: 2000 }
                },
                transport: {
                    bus: { min: 100, max: 300 }, // per traveler, assumed long distance cost multiplier
                    train: { min: 200, max: 500 },
                    air: { min: 1000, max: 3000 },
                    private: { min: 1500, max: 4000 }, // assumed total transport cost for the trip
                    cng: { min: 50, max: 200 }
                },
                attractions: {
                    low: { min: 20, max: 100 }, // per person per day
                    medium: { min: 50, max: 200 },
                    high: { min: 100, max: 500 }
                }
            };

            // Calculate cost on form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                calculateCost();
            });

            function calculateCost() {
                // Get form values
                const days = parseInt(document.getElementById('days').value) || 0;
                const travelers = parseInt(document.getElementById('travelers').value) || 1;
                const hotelCategory = document.getElementById('hotelCategory').value;
                const rooms = parseInt(document.getElementById('rooms').value) || 1;
                const transportType = document.getElementById('transportType').value;
                const foodType = document.getElementById('foodType').value;
                const attractionFees = document.getElementById('attractionFees').value;
                const season = document.getElementById('season').value;

                // Safety check for travelers to prevent division by zero
                const safeTravelers = travelers < 1 ? 1 : travelers;

                // Season multiplier
                const seasonMultipliers = {
                    normal: 1,
                    peak: 1.3,
                    offpeak: 0.8,
                    festival: 1.5
                };

                const seasonMultiplier = seasonMultipliers[season] || 1;

                // Calculate costs
                // Note: The original logic mixes per-person and fixed costs based on assumption.
                // We maintain the original structure for consistency.
                const accommodationCost = calculateAccommodationCost(days, hotelCategory, rooms) * seasonMultiplier;
                const transportationCost = calculateTransportationCost(days, transportType, safeTravelers) * seasonMultiplier;
                const foodCost = calculateFoodCost(days, foodType, safeTravelers) * seasonMultiplier;
                const attractionCost = calculateAttractionCost(days, attractionFees, safeTravelers) * seasonMultiplier;
                const additionalCost = calculateAdditionalCost(); // Additional costs are fixed/set by checkbox

                const totalCost = accommodationCost + transportationCost + foodCost + attractionCost + additionalCost;
                const costPerPerson = totalCost / safeTravelers;

                // Update UI
                updateCostDisplay(totalCost, costPerPerson, accommodationCost, transportationCost, foodCost, attractionCost, additionalCost);
                updateBudgetBreakdown(accommodationCost, transportationCost, foodCost, attractionCost + additionalCost, totalCost);
            }

            /** Helper Functions using average cost from the data structure */

            function calculateAccommodationCost(days, category, rooms) {
                const range = costData.accommodation[category] || { min: 0, max: 0 };
                const avgCost = (range.min + range.max) / 2;
                // Cost is generally per night/room
                return avgCost * days * rooms;
            }

            function calculateTransportationCost(days, type, travelers) {
                const range = costData.transport[type] || { min: 0, max: 0 };
                const avgCost = (range.min + range.max) / 2;

                let baseCost;
                if (type === 'private' || type === 'air') {
                    // For air/private car, assume a higher, fixed base cost per trip
                    baseCost = avgCost * travelers;
                } else {
                    // For bus/train, assume cost per person, factored by trip duration
                    baseCost = avgCost * travelers * (days > 1 ? days / 2 : 1);
                }

                // Adding a buffer for local transport (taka 200 per day)
                return baseCost + (days * 200 * travelers);
            }

            function calculateFoodCost(days, type, travelers) {
                const range = costData.food[type] || { min: 0, max: 0 };
                const avgCost = (range.min + range.max) / 2;
                // 3 meals per day * cost per meal * days * travelers
                return avgCost * 3 * days * travelers;
            }

            function calculateAttractionCost(days, level, travelers) {
                const range = costData.attractions[level] || { min: 0, max: 0 };
                const avgCost = (range.min + range.max) / 2;
                // Cost per person * number of activity days (approx. equal to total days)
                return avgCost * days * travelers;
            }

            function calculateAdditionalCost() {
                let cost = 0;
                // Fixed amounts for additional items
                if (document.getElementById('shopping').checked) cost += 1500; // Increased estimate slightly
                if (document.getElementById('guide').checked) cost += 1500 * (parseInt(document.getElementById('days').value) || 1); // Guide per day
                if (document.getElementById('emergency').checked) cost += 1000;
                return cost;
            }

            /** UI Update Functions */

            function formatBDT(value) {
                // Formats the number with BDT symbol (৳) and grouping
                return `৳ ${Math.round(value).toLocaleString('en-IN')}`;
            }

            function updateCostDisplay(total, perPerson, accommodation, transport, food, attraction, additional) {
                document.getElementById('totalCost').textContent = formatBDT(total);
                document.getElementById('costPerPerson').textContent = formatBDT(perPerson);
                document.getElementById('accommodationCost').textContent = formatBDT(accommodation);
                document.getElementById('transportationCost').textContent = formatBDT(transport);
                document.getElementById('foodCost').textContent = formatBDT(food);
                document.getElementById('attractionCost').textContent = formatBDT(attraction);
                document.getElementById('additionalCost').textContent = formatBDT(additional);
                document.getElementById('finalTotalCost').textContent = formatBDT(total);
            }

            function updateBudgetBreakdown(accommodation, transport, food, other, total) {
                // Prevent division by zero if total is 0
                if (total === 0) {
                    const zeroPercent = '0%';
                    document.querySelectorAll('[id$="Percent"]').forEach(el => el.textContent = zeroPercent);
                    document.querySelectorAll('[id$="Bar"]').forEach(el => el.style.width = zeroPercent);
                    return;
                }

                // Calculate percentages and update text/bars
                const categories = [
                    { id: 'accommodation', cost: accommodation, bar: 'bg-success' },
                    { id: 'transportation', cost: transport, bar: 'bg-info' },
                    { id: 'food', cost: food, bar: 'bg-warning' },
                    { id: 'other', cost: other, bar: 'bg-purple' }
                ];

                categories.forEach(category => {
                    const percentage = Math.round((category.cost / total) * 100);
                    document.getElementById(`${category.id}Percent`).textContent = `${percentage}%`;
                    document.getElementById(`${category.id}Bar`).style.width = `${percentage}%`;
                });
            }

            // Initial calculation on page load
            calculateCost();
        });
    </script>
@endpush
