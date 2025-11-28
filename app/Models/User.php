<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'bio',
        'avatar',
        'has_selected_favorites',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Add this method for saved spots / wishlist
    public function savedSpots()
    {
        return $this->belongsToMany(
            \App\Models\Spot::class, // Related model
            'wishlists',             // Pivot table
            'user_id',               // Foreign key on pivot table for User
            'spot_id'                // Foreign key on pivot table for Spot
        )->withTimestamps();
    }
    public function activities()
    {
        return $this->hasMany(\App\Models\Activity::class, 'user_id', 'id');
    }

}
