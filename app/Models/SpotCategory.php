<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SpotCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'is_active'
    ];

    // Auto-generate slug when creating a spot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($spot) {
            if (empty($spot->slug)) {
                $spot->slug = Str::slug($spot->name);
            }
        });

        static::updating(function ($spot) {
            if (empty($spot->slug)) {
                $spot->slug = Str::slug($spot->name);
            }
        });
    }

}
