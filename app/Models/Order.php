<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'total_price',
        'status'
    ];

    // An order belongs to one car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // An order belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
