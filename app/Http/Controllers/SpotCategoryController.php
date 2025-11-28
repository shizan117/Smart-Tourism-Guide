<?php

namespace App\Http\Controllers;

use App\Models\SpotCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpotCategoryController extends Controller
{
    /**
     * List categories
     */
    public function index()
    {
        $categories = SpotCategory::latest()->get();
        return view('backend.spots.categories.index', compact('categories'));
    }

    /**
     * Store new category
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:spot_categories,name'
        ]);

        SpotCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => 1,
        ]);

        return back()->with('success', 'Category added successfully!');
    }

    /**
     * Update category (Edit Modal)
     */
    public function update(Request $request, $id)
    {
        $category = SpotCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:spot_categories,name,' . $id
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Category updated!');
    }

    /**
     * Delete category
     */
    public function destroy($id)
    {
        $category = SpotCategory::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted!');
    }

    /**
     * AJAX Status Toggle
     */
    public function statusUpdate(Request $request, $id)
    {
        $category = SpotCategory::findOrFail($id);

        $category->is_active = $request->status;
        $category->save();

        return response()->json(['success' => true]);
    }
}
