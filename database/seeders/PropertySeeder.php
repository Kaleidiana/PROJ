<?php

namespace Database\Seeders; // Ensure the correct namespace

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::create([
            'title' => 'Sample Property 1',
            'description' => 'A lovely 2-bedroom apartment',
            'price' => 1200,
            'location' => 'Sample Location',
            'user_id' => 1, // Replace with an actual user ID that exists in the users table
        ]);

        // You can add more properties here
        Property::create([
            'title' => 'Sample Property 2',
            'description' => 'A lovely 1-bedroom apartment',
            'price' => 1500,
            'location' => 'Sample Location',
            'user_id' => 2, // Replace with an actual user ID that exists in the users table
        ]);
    }
}
