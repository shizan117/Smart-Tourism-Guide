<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index(Request $request)
    {
        $query = Spot::query();

        /* ------------------------
         * SEARCH
         * ------------------------ */
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                    ->orWhere('location', 'LIKE', "%$search%")
                    ->orWhere('category', 'LIKE', "%$search%");
            });
        }

        /* ------------------------
         * CATEGORY FILTER
         * ------------------------ */
        if ($request->filled('category') && is_array($request->category)) {
            $query->whereIn('category', $request->category);
        }


        /* ------------------------
         * RATING FILTER
         * ------------------------ */
        if ($request->filled('rating')) {
            $query->where('rating', '>=', (int) $request->rating);
        }

        /* ------------------------
         * PRICE FILTER
         * ------------------------ */
        if ($request->price === 'free') {
            $query->where('entry_fee', 0);
        } elseif ($request->price === 'paid') {
            $query->where('entry_fee', '>', 0);
        }

        /* ------------------------
         * QUICK FILTER: 3+ STARS
         * ------------------------ */
        if ($request->rating == 3 && !$request->has('near') && !$request->has('city')) {
            $query->where('rating', '>=', 3);
        }

        /* ======================================================
         * QUICK FILTER: NEAR ME (requires lat/lng)
         * ====================================================== */
        if ($request->near == 1 && $request->lat && $request->lng) {

            $lat = $request->lat;
            $lng = $request->lng;

            // Add distance calculation using Haversine formula
            $query->selectRaw("
            spots.*,
            (6371 * acos(
                cos(radians($lat)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians($lng)) +
                sin(radians($lat)) *
                sin(radians(latitude))
            )) AS distance
        ");

            // Only spots within 50 km
            $query->having('distance', '<=', 50);

            // Order nearest first
            $query->orderBy('distance');
        }

        /* ======================================================
         * QUICK FILTER: IN MY CITY
         * ====================================================== */
        if ($request->filled('city')) {
            $query->where('location', 'LIKE', "%{$request->city}%");
        }

        /* ------------------------
         * SORTING OPTIONS
         * ------------------------ */
        switch ($request->sort) {
            case 'rating':
                $query->orderByDesc('rating');
                break;

            case 'name':
                $query->orderBy('name');
                break;

            case 'price_low':
                $query->orderBy('entry_fee');
                break;

            case 'price_high':
                $query->orderByDesc('entry_fee');
                break;

            default: // popularity
                $query->orderByDesc('review_count');
                break;
        }

        /* ------------------------
         * PAGINATE
         * ------------------------ */
        $spots = $query->paginate(12)->withQueryString();

        /* ------------------------
         * CATEGORY LIST FOR SIDEBAR
         * ------------------------ */
        $categories = Spot::select('category')->distinct()->pluck('category');

        return view('frontend.spots.index', compact('spots', 'categories'));
    }

    public function show(Spot $spot)
    {
        // Increment view count
        $spot->increment('view_count');

        return view('frontend.spots.show', compact('spot'));
    }
}
