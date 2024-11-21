<?php

// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // User who made the order
        'car_id',  // The car being ordered
        'quantity', // The quantity of cars being ordered
        'total_price', // The total price of the order
        'status', // The status of the order (pending, completed, etc.)
    ];

    // Define the relationship with the Car model
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
