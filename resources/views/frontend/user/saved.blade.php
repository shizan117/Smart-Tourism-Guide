@extends('backend.layouts.master')
@section('title','My Wishlist')
@section('content')
    <main class="main-content">
        <div class="container-fluid p-0">
            <h2 class="page-title">My Wishlist</h2>
            <p class="mb-4 text-muted">All the spots you saved for future trips.</p>

            <div class="row">
                @forelse($spots as $spot)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $spot->image) }}" class="card-img-top" alt="{{ $spot->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $spot->name }}</h5>
                                <p class="card-text">{{ Str::limit($spot->description, 60) }}</p>
                                <a href="{{ route('spot_details', $spot->slug) }}" class="btn btn-primary w-100">View Spot</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        You have no saved spots.
                    </div>
                @endforelse
            </div>
        </div>
    </main>
@endsection
