@extends('frontend.layouts.master')

@section('title','Explore Tourist Spots')

@section('content')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold">Explore Tourist Spots</h1>
                    <p class="lead">Discover amazing places with detailed information, reviews, and photos</p>

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('spots.index') }}" class="mt-4">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" name="search"
                                   placeholder="Search by name, location, or category..."
                                   value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="row">

            <!-- Filters Sidebar -->
            <div class="col-lg-3">
                <form id="filterForm" method="GET" action="{{ route('spots.index') }}">
                    <div class="filter-sidebar">

                        <h5 class="section-title">Filters</h5>

                        <!-- Category Filter -->
                        <!-- Category Filter -->
                        <div class="mb-4">
                            <h6>Category</h6>

                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="category[]"
                                           value="{{ $category }}"
                                           id="category{{ $loop->index }}"
                                           {{ is_array(request('category')) && in_array($category, request('category')) ? 'checked' : '' }}
                                           onchange="document.getElementById('filterForm').submit()">

                                    <label class="form-check-label" for="category{{ $loop->index }}">
                                        {{ $category }}
                                    </label>
                                </div>
                            @endforeach
                        </div>


                        <!-- Rating Filter -->
                        <div class="mb-4">
                            <h6>Minimum Rating</h6>
                            @foreach([5,4,3] as $rating)
                                <div class="form-check star-rating">
                                    <input class="form-check-input " type="radio" name="rating" value="{{ $rating }}"
                                           id="rating{{ $rating }}"
                                           {{ request('rating') == $rating ? 'checked' : '' }}
                                           onchange="document.getElementById('filterForm').submit()">

                                    <label class="form-check-label " for="rating{{ $rating }}">
                                        @for($i=1;$i<=5;$i++)
                                            <i class="{{ $i <= $rating ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor
                                        <span style="color: #000000">{{ $rating }}+ Stars </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h6>Entry Fee</h6>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" value="free"
                                       {{ request('price')=='free'?'checked':'' }}
                                       onchange="document.getElementById('filterForm').submit()">
                                <label class="form-check-label">Free</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" value="paid"
                                       {{ request('price')=='paid'?'checked':'' }}
                                       onchange="document.getElementById('filterForm').submit()">
                                <label class="form-check-label">Paid Entry</label>
                            </div>
                        </div>

                        <a href="{{ route('spots.index') }}" class="btn btn-outline-secondary w-100">
                            Reset Filters
                        </a>

                    </div>

                    <!-- Hidden Quick Filter Fields -->
                    <input type="hidden" name="lat" id="lat" value="{{ request('lat') }}">
                    <input type="hidden" name="lng" id="lng" value="{{ request('lng') }}">
                    <input type="hidden" name="near" id="near" value="{{ request('near') }}">
                    <input type="hidden" name="city" id="city" value="{{ request('city') }}">
                </form>
            </div>

            <!-- Spots Listing -->
            <div class="col-lg-9">

                <!-- Top Filters Row -->
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h4 class="section-title mb-0">{{ $spots->total() }} Spots Found</h4>

                    <!-- Quick Filter Buttons -->
                    <div class="btn-group">
                        <!-- Near Me Button -->
                        <button type="button"
                                class="btn btn-sm btn-outline-primary {{ request('near')==1 ? 'active' : '' }}"
                                onclick="applyNearMe(this)">
                            <i class="fas fa-location-arrow"></i> Near Me
                        </button>

                        <!-- In My City Button -->
                        <button type="button"
                                class="btn btn-sm btn-outline-primary {{ request('city') ? 'active' : '' }}"
                                onclick="enterCity()">
                            <i class="fas fa-city"></i> In My City
                        </button>

                        <!-- 3+ Stars -->
                        <a href="javascript:void(0)"
                           class="btn btn-sm btn-outline-primary {{ request('rating')==3 ? 'active' : '' }}"
                           onclick="applyThreeStars(this)">
                            3+ Stars
                        </a>


                    </div>

                    <!-- Sorting -->
                    <div>
                        <select class="form-select form-select-sm"
                                onchange="window.location.href=this.value">

                            <option value="{{ request()->fullUrlWithQuery(['sort'=>'popularity']) }}"
                                {{ request('sort')=='popularity'?'selected':'' }}>
                                Popularity
                            </option>

                            <option value="{{ request()->fullUrlWithQuery(['sort'=>'rating']) }}"
                                {{ request('sort')=='rating'?'selected':'' }}>
                                Highest Rated
                            </option>

                            <option value="{{ request()->fullUrlWithQuery(['sort'=>'name']) }}"
                                {{ request('sort')=='name'?'selected':'' }}>
                                Name A-Z
                            </option>

                            <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_low']) }}"
                                {{ request('sort')=='price_low'?'selected':'' }}>
                                Price Low→High
                            </option>

                            <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_high']) }}"
                                {{ request('sort')=='price_high'?'selected':'' }}>
                                Price High→Low
                            </option>

                        </select>
                    </div>
                </div>

                <!-- Spots Grid -->
                <div class="row">
                    @forelse($spots as $spot)
                        <div class="col-md-6 col-lg-4 mb-4">

                            <div class="card spot-card">

                                <img src="{{ $spot->image ? asset('storage/'.$spot->image) :
                                    'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?w=500' }}"
                                     class="card-img-top"
                                     style="height:200px;object-fit:cover;">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{ $spot->name }}</h5>
                                        <span class="badge-category">{{ $spot->category }}</span>
                                    </div>

                                    <p class="card-text">{{ Str::limit($spot->description,100) }}</p>

                                    <div class="mb-1">
                                        @for($i=1;$i<=5;$i++)
                                            <i class="{{ $i <= $spot->rating ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor

                                        <span class="ms-1">
                                            {{ number_format($spot->rating,1) }}
                                            ({{ $spot->review_count }} reviews)
                                        </span>
                                    </div>

                                    <div class="d-flex justify-content-between mt-2">
                                        <span><i class="fas fa-map-marker-alt"></i> {{ $spot->location }}</span>
                                        <span class="fw-bold {{ $spot->entry_fee==0?'text-success':'text-danger' }}">
                                            {{ $spot->entry_fee==0 ? 'Free' : '৳'.number_format($spot->entry_fee) }}
                                        </span>
                                    </div>

                                    <a href="{{ route('spot_details',$spot) }}"
                                       class="btn btn-primary btn-sm mt-3">
                                        View Details
                                    </a>

                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-3x text-muted"></i>
                            <h4>No spots found</h4>
                            <p class="text-muted">Try adjusting your filters</p>
                        </div>
                    @endforelse
                </div>

                @if($spots->hasPages())
                    <nav class="mt-4">
                        {{ $spots->links() }}
                    </nav>
                @endif

            </div>
        </div>
    </div>

@endsection



