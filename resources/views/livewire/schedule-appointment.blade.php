<div>
    <x-user.section-div-style>
    <div class="flex items-start justify-between px-8 py-12 bg-gray-200">
        {{-- <div class="w-1/2">
            <div class="bg-gray-200 h-96"></div>
        </div> --}}
        
        <div class="grid grid-cols-2 col-span-2 gap-16">
            <div class="mb-4">
                <div class="w-full">
                        <div class="bg-gray-300 h-96 rounded-lg"></div>
                    </div>
                <h3 class="text-lg font-semibold font-sans">Property Details</h3>
                <div class="mt-2">
                    <p class="mb-1"><strong>Price:</strong> ${{ number_format($price) }}</p>
                    <p class="mb-1"><strong>Bedrooms:</strong> {{ $bedroom }}</p>
                    <p class="mb-1"><strong>Bathrooms:</strong> {{ $bathrooms }}</p>
                    <p class="mb-1"><strong>Square Feet:</strong> {{ $size }}</p>
                    <p class="mb-1"><strong>Location:</strong> {{ $street }}, {{ $city }}, {{ $state }} {{ $postal_code }}, {{ $country }}</p>
                    <p class="mb-1"><strong>Status:</strong> {{ $status }}</p>
                </div>
                <p class="mt-4">
                    This stunning {{ $type }} villa offers breathtaking ocean views, a private pool, and direct beach access. The open-concept living area features floor-to-ceiling windows, allowing natural light to flood the space. The gourmet kitchen is equipped with high-end appliances and a large island, perfect for entertaining. The master suite includes a luxurious bathroom with a soaking tub and a private balcony overlooking the ocean.
                </p>
            </div>
            <div class="">
                <form wire:submit.prevent="setAppointment" class="space-y-4 p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-lg font-medium mb-2">Schedule a Viewing</h3>
                    
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">Name</label>
                        <input type="text" id="name" name="name" class="border rounded px-3 py-2 w-full text-gray-600" placeholder="Your name" disabled value="{{ Auth::user()->name }}">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="email" class="border rounded px-3 py-2 w-full text-gray-600" placeholder="Your email" disabled value="{{ Auth::user()->email }}">
                    </div>
                    <div>
                        <label for="date" class="block text-gray-700 font-medium">Preferred Date</label>
                        <input type="date" id="date" wire:model="preferred_date" class="border rounded px-3 py-2 w-full">
                    </div>
                    <input type="hidden" name="agent_id" wire:model="agent_id">
                    
                    <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded hover:bg-gray-800">Schedule Viewing</button>
                    
                    @if (session()->has('message'))
                        <div class="mt-4 text-green-600">{{ session('message') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-user.section-div-style>
</div>