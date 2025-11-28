<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'category',
        'latitude',
        'longitude',
        'entry_fee',
        'opening_hours',
        'highlights',
        'image',
        'gallery',
        'rating',
        'review_count',
        'view_count',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'entry_fee' => 'decimal:2',
        'rating' => 'float',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'gallery' => 'array'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Scope for active spots
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for featured spots
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for category filter
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope for search
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('location', 'like', "%{$search}%");
    }
}
