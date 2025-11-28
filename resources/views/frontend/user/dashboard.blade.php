@extends('backend.layouts.master')
@section('title','User Dashboard')
@section('content')
    <main class="main-content">
        <div class="container-fluid p-0">
            <h2 class="page-title">Welcome, {{ auth()->user()->name }} 👋</h2>
            <p class="mb-4 text-muted">Your personalized travel planning dashboard.</p>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-route card-icon text-primary"></i>
                            <div class="stat-number">Plan</div>
                            <div class="stat-label">Smart Route Planner</div>
                            <a href="{{ route('plan_creator') }}" class="btn btn-primary-teal mt-2 w-100">Start Planning</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-calculator card-icon text-success"></i>
                            <div class="stat-number">Budget</div>
                            <div class="stat-label">Cost Calculator</div>
                            <a href="{{ route('cost_calculator') }}" class="btn btn-primary-teal mt-2 w-100">Calculate Cost</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-lightbulb card-icon text-info"></i>
                            <div class="stat-number">AI</div>
                            <div class="stat-label">Personalized Suggestions</div>
                            <a href="{{ route('spots.index') }}" class="btn btn-primary-teal mt-2 w-100">View Suggestions</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-heart card-icon text-danger"></i>
                            <div class="stat-number">{{ $savedCount ?? 0 }}</div>
                            <div class="stat-label">Wishlist</div>
                            <a href="{{ route('user.saved') }}" class="btn btn-primary-teal mt-2 w-100">View Wishlist</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="mb-3 text-secondary">Your Recent Activity</h4>

                    <div class="admin-table">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Activity</th>
                                <th>IP</th>
                                <th>Location</th>
                                <th>Time</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($recentActivities as $index => $act)
                                @php
                                    $meta = (array) $act->meta;
                                    $ip = $meta['ip'] ?? 'N/A';
                                    $lat = $meta['lat'] ?? null;
                                    $lon = $meta['lon'] ?? null;
                                @endphp

                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ ucwords(str_replace('_', ' ', $act->type)) }}</td>

                                    <td>{{ $ip }}</td>

                                    <td>
                                        @if($lat && $lon)
                                            <span class="text-success">
                        {{ $lat }}, {{ $lon }}
                    </span>
                                            <br>
                                            <a href="https://www.google.com/maps?q={{ $lat }},{{ $lon }}" target="_blank" class="text-primary small">
                                                View on Map
                                            </a>
                                        @else
                                            <span class="text-muted">Not Available</span>
                                        @endif
                                    </td>

                                    <td>{{ $act->created_at->diffForHumans() }}</td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No recent activity</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
