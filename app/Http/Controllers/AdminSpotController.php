<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSpotController extends Controller
{
    public function index()
    {
        $spots = Spot::latest()->paginate(10);
        return view('backend.spots.index', compact('spots'));
    }

    public function create()
    {
        $categories = ['Nature & Parks', 'Historical Sites', 'Beaches', 'Museums', 'Adventure Sports', 'Religious Sites', 'Markets', 'Restaurants'];
        return view('backend.spots.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'entry_fee' => 'required|numeric|min:0',
            'opening_hours' => 'nullable|string',
            'highlights' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare spot data
        $spotData = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'location' => $request->location,
            'category' => $request->category,
            'entry_fee' => $request->entry_fee,
            'opening_hours' => $request->opening_hours,
            'highlights' => $request->highlights,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'spot_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('backend/img/spots');

            // Create folder if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move file to public folder
            $file->move($destinationPath, $filename);

            // Add image path to spot data
            $spotData['image'] = 'backend/img/spots/' . $filename;
        }

        // Create spot with image path
        Spot::create($spotData);

        return redirect()->route('admin.spots.index')->with('success', 'Spot created successfully!');
    }

    public function edit(Spot $spot)
    {
        $categories = ['Nature & Parks', 'Historical Sites', 'Beaches', 'Museums', 'Adventure Sports', 'Religious Sites', 'Markets', 'Restaurants'];
        return view('backend.spots.edit', compact('spot', 'categories'));
    }

    public function update(Request $request, Spot $spot)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'entry_fee' => 'required|numeric|min:0',
            'opening_hours' => 'nullable|string',
            'highlights' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare update data
        $updateData = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'location' => $request->location,
            'category' => $request->category,
            'entry_fee' => $request->entry_fee,
            'opening_hours' => $request->opening_hours,
            'highlights' => $request->highlights,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'spot_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('backend/img/spots');

            // Create folder if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move file to public folder
            $file->move($destinationPath, $filename);

            // Add image path to update data
            $updateData['image'] = 'backend/img/spots/' . $filename;

            // Optional: Delete old image if exists
            if ($spot->image && file_exists(public_path($spot->image))) {
                unlink(public_path($spot->image));
            }
        }

        // Update spot with image path
        $spot->update($updateData);

        return redirect()->route('admin.spots.index')->with('success', 'Spot updated successfully!');
    }
    public function destroy(Spot $spot)
    {
        $spot->delete();
        return redirect()->route('admin.spots.index')->with('success', 'Spot deleted successfully!');
    }
}
