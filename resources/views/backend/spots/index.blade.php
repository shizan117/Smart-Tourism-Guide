@extends('backend.layouts.master')

@section('title','Manage Spots')

@section('content')
    <main class="main-content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">Manage Tourist Spots</h2>
                <a href="{{ route('admin.spots.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Spot
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-map-marker-alt card-icon text-primary"></i>
                            <div class="stat-number">{{ $spots->total() }}</div>
                            <div class="stat-label">Total Spots</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-star card-icon text-warning"></i>
                            <div class="stat-number">{{ \App\Models\Spot::where('is_featured', true)->count() }}</div>
                            <div class="stat-label">Featured Spots</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-eye card-icon text-info"></i>
                            <div class="stat-number">{{ \App\Models\Spot::sum('view_count') }}</div>
                            <div class="stat-label">Total Views</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-comments card-icon text-success"></i>
                            <div class="stat-number">{{ \App\Models\Spot::sum('review_count') }}</div>
                            <div class="stat-label">Total Reviews</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Spots Table -->
            <div class="card">
                <div class="card-body">
                    <div class="admin-table">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Spot</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Entry Fee</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($spots as $spot)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $spot->image ? asset($spot->image) : 'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=60' }}"
                                                 class="rounded me-3" width="40" height="40" alt="{{ $spot->name }}" style="object-fit: cover;">
                                            <div>
                                                <h6 class="mb-0">{{ $spot->name }}</h6>
                                                <small class="text-muted">{{ $spot->view_count }} views</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $spot->category }}</td>
                                    <td>{{ $spot->location }}</td>
                                    <td>৳{{ number_format($spot->entry_fee) }}</td>
                                    <td>
                                        <span class="star-rating small">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="{{ $i <= $spot->rating ? 'fas' : 'far' }} fa-star"></i>
                                            @endfor
                                        </span>
                                        <small class="text-muted">({{ $spot->rating }})</small>
                                    </td>
                                    <td>
                                        <span class="badge {{ $spot->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $spot->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                        @if($spot->is_featured)
                                            <span class="badge bg-warning ms-1">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('spot_details', $spot) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.spots.edit', $spot) }}" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.spots.destroy', $spot) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $spots->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
