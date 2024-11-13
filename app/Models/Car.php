<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Define the table associated with the model (if it's not the plural form of the model name)
    protected $table = 'cars';

    // Define which attributes are mass assignable (to protect against mass-assignment vulnerabilities)
    protected $fillable = [
        'make',
        'model',
        'year',
        'price',
        'image',
        'description'
    ];

    // If you want to define relationships, such as a car having many orders:
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
