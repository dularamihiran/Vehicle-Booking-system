<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Vehicle::create([
            'name' => 'Toyota Corolla',
            'type' => 'Car',
            'image' => 'images/toyota-corolla.jpg',  // Correct relative path for public directory
            'available_count' => 5,
        ]);

        Vehicle::create([
            'name' => 'Honda Civic',
            'type' => 'SUV',
            'image' => 'images/Honda Civic.jpg',
            'available_count' => 2,
        ]);
        Vehicle::create([
            'name' => 'Nissan Altima',
            'type' => 'Car',
            'image' => 'images/Nissan Altima.jpg',
            'available_count' => 4,
        ]);
        Vehicle::create([
            'name' => 'Chevrolet Silverado',
            'type' => 'Truck',
            'image' => 'images/chevrolet-silverado.jpg',
            'available_count' => 1,
        ]);
        Vehicle::create([
            'name' => 'Jeep Wrangler',
            'type' => 'SUV',
            'image' => 'images/jeep-wrangler.jpg',
            'available_count' => 2,
        ]);
        Vehicle::create([
            'name' => 'Volkswagen Golf',
            'type' => 'Car',
            'image' => 'images/volkswagen-golf.jpg',
            'available_count' => 3,
        ]);
        Vehicle::create([
            'name' => 'Subaru Forester',
            'type' => 'SUV',
            'image' => 'images/subaru-forester.jpg',
            'available_count' => 1,
        ]);
        Vehicle::create([
            'name' => 'Ford F-150',
            'type' => 'Truck',
            'image' => 'images/Ford F-150.jpg',
            'available_count' => 2,
        ]);
        Vehicle::create([
            'name' => 'volkswagen golf',
            'type' => 'Car',
            'image' => 'images/volkswagen-golf.jpg',
            'available_count' => 4,
        ]);



    }
}

