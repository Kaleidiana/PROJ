<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        Car::create([
            'make' => 'Toyota',
            'model' => 'Camry',
            'year' => 2022,
            'price' => 24000,
            'image' => 'camry.jpg',
            'description' => 'A reliable and fuel-efficient sedan.'
        ]);

        Car::create([
            'make' => 'Ford',
            'model' => 'Mustang',
            'year' => 2023,
            'price' => 30000,
            'image' => 'mustang.jpg',
            'description' => 'A powerful and stylish sports car.'
        ]);
    }
}
