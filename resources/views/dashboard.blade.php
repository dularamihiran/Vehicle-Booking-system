<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Set the entire page background to white -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Available Vehicles Section -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold mb-4">Available Vehicles</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($vehicles as $vehicle)
                        <!-- Set car card background color to orange -->
                        <div class="bg-orange-500 shadow-lg rounded-lg overflow-hidden">
                            <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->name }}" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h4 class="font-semibold text-lg text-black">{{ $vehicle->name }}</h4>
                                <p class="text-orange-200">Type: {{ $vehicle->type }}</p>
                                <p class="mt-2 text-orange-100">Available: {{ $vehicle->available_count }}</p>
                                <form action="{{ route('vehicles.book', $vehicle->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                        Book Vehicle
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- User's Booked Vehicles Section -->
            <div>
                <h3 class="text-2xl font-bold mb-4">Your Booked Vehicles</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($userBookedVehicles as $bookedVehicle)
                        <!-- Set car card background color to orange -->
                        <div class="bg-orange-500 shadow-lg rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/'.$bookedVehicle->vehicle->image) }}" alt="{{ $bookedVehicle->vehicle->name }}" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h4 class="font-semibold text-lg text-black">{{ $bookedVehicle->vehicle->name }}</h4>
                                <p class="text-orange-200">Type: {{ $bookedVehicle->vehicle->type }}</p>

                                <p class="mt-2 text-black">Booked Count: {{ $bookedVehicle->booked_count }}</p>
                                <p class="mt-2 text-black">Available: {{ $bookedVehicle->vehicle->available_count }}</p>

                                <form action="{{ route('vehicles.increment', $bookedVehicle->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                        Add another car
                                    </button>
                                </form>

                                <form action="{{ route('vehicles.decrement', $bookedVehicle->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                        reduce one car
                                    </button>
                                </form>

                                <form action="{{ route('vehicles.cancel', $bookedVehicle->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                        Cancel Booking
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
