<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Define the table associated with the model (if it's not the plural form of the model name)
    protected $table = 'cars';

    // Define which attributes are mass assignable
    protected $fillable = [
        'carname', // Add this line
        'make',
        'model',
        'year',
        'price',
        'image',
        'description',
    ];

    // Define relationships (if any)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
