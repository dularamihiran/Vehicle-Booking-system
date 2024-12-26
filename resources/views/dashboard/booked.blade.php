<x-app-layout>
    <x-slot name="header">
        
        <div class="flex mt-4 space-x-4">
            <!-- Available Vehicles Button -->
            <a href="{{ route('dashboard.available') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Available Vehicles
            </a>

            <!-- Booked Vehicles Button -->
            <a href="{{ route('dashboard.booked') }}"
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Booked Vehicles
            </a>
        </div>
    </x-slot>

    <!-- Original Dashboard Content -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User's Booked Vehicles Section -->
            <div>
                <h3 class="text-2xl font-bold mb-4">Your Booked Vehicles</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($userBookedVehicles as $bookedVehicle)
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
                                        Reduce one car
                                    </button>
                                </form>

                                <form action="{{ route('vehicles.cancel', $bookedVehicle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
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
