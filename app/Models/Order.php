<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'customer_name',
        'customer_email',
        'quantity',
        'total_price',
    ];

    // Define the relationship with the Car model
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
