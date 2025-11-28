<?php

namespace Database\Seeders;

use App\Models\Spot;
use Illuminate\Database\Seeder;

class SpotSeeder extends Seeder
{
    public function run()
    {
        $spots = [
            [
                'name' => 'Sundarbans Mangrove Forest',
                'slug' => 'sundarbans-mangrove-forest',
                'description' => 'The Sundarbans is the largest mangrove forest in the world, located in the delta region of Bangladesh. It is home to the Royal Bengal Tiger and various wildlife species.',
                'location' => 'Khulna Division',
                'category' => 'Nature & Parks',
                'entry_fee' => 500,
                'rating' => 4.8,
                'review_count' => 234,
                'is_featured' => true,
            ],
            [
                'name' => 'Cox\'s Bazar Beach',
                'slug' => 'coxs-bazar-beach',
                'description' => 'The longest natural sea beach in the world, stretching over 120 kilometers. Perfect for sunset views and water sports.',
                'location' => 'Cox\'s Bazar',
                'category' => 'Beaches',
                'entry_fee' => 0,
                'rating' => 4.5,
                'review_count' => 567,
                'is_featured' => true,
            ],
            // Add more sample spots...
        ];

        foreach ($spots as $spot) {
            Spot::create($spot);
        }
    }
}
