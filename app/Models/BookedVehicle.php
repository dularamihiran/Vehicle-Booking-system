<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedVehicle extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'booked_count', // Add booked_count for tracking the booked quantity
    ];

    /**
     * Relationship: The user who booked this vehicle.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: The vehicle that is booked.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
