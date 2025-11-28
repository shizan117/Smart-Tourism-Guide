@extends('backend.layouts.master')

@section('title','Dashboard')

@section('content')

     <!-- Main Content Area -->
    <main class="main-content">
        <!-- Dashboard Content Placeholder -->
        <div class="container-fluid p-0">
            <h2 class="page-title">Welcome Back!</h2>
            <p class="mb-4 text-muted">A quick overview of your tourism platform.</p>

            <div class="row">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3 hover-effect"
                         onclick="window.location.href='{{ route('admin.spots.index') }}'"
                         style="cursor: pointer;">
                        <div class="card-body">
                            <i class="fas fa-map-marker-alt card-icon text-primary"></i>
                            <div class="stat-number">{{ $total_spots }}</div>
                            <div class="stat-label">Total Active Spots</div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3 hover-effect"
                         onclick="window.location.href='{{ route('admin.users') }}'"
                         style="cursor: pointer;">
                            <div class="card-body">
                                <i class="fas fa-users card-icon text-success"></i>
                                <div class="stat-number">{{$total_registered_users}}</div>
                                <div class="stat-label">Registered Users</div>
                            </div>
                        </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-route card-icon text-info"></i>
                            <div class="stat-number">42</div>
                            <div class="stat-label">Trip Plans Created</div>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card text-center p-3">
                        <div class="card-body">
                            <i class="fas fa-star card-icon text-warning"></i>
                            <div class="stat-number">56</div>
                            <div class="stat-label">New Reviews</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="mb-3 text-secondary">Recent User Activity</h4>
                    <div class="admin-table">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Activity</th>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Added new spot: 'Ancient Ruins'</td>
                                <td>John Doe</td>
                                <td>2 hours ago</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Left a review on 'Beach Paradise'</td>
                                <td>Jane Smith</td>
                                <td>5 hours ago</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Created a new trip plan</td>
                                <td>TravelFan</td>
                                <td>1 day ago</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
