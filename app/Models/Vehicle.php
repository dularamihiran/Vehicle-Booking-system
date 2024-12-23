<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'type',
        'image',
        'available_count',
    ];

    /**
     * Relationship: Bookings for this vehicle.
     */
    public function bookings()
    {
        return $this->hasMany(BookedVehicle::class, 'vehicle_id');
    }
}
