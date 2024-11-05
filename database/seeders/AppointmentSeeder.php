<?php

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        Appointment::create([
            'user_id' => 1,
            'property_id' => 1,
            'appointment_date' => now()->addDays(2),
        ]);
        // Add more sample appointments if desired
    }
}
