<div>
    {{-- The whole world belongs to you. --}}
    <div class="py-12 bg-gray-50 ">
        <div id="createModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto hidden">
            <div @click.outside="isOpen = false"
                class="relative w-full max-w-4xl mx-4 my-8 bg-white rounded-xl shadow-lg max-h-[90vh]">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Modal Header -->
                    <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Create New Property</h2>
                            <p class="mt-1 text-sm text-gray-500">Fill in the details below to list a new property.</p>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form action="{{ route('admin.property.create') }}" method="POST" enctype="multipart/form-data"
                        class="p-8">
                        @csrf

                        <!-- Main Information Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Basic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <!-- Title -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Property
                                        Title</label>
                                    <input type="text" id="title" name="title"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('title')
                                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price
                                        (₱)</label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">₱</span>
                                        <input type="number" id="price" name="price"
                                            class="w-full pl-8 rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    @error('price')
                                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Property
                                        Type</label>
                                    <select id="type" name="type"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 h-[41.33px]">
                                        <option value="">Select type</option>
                                        <option value="house">House</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="land">Land</option>
                                        <option value="commercial">Commercial</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Property Details Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Property Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <!-- Bedrooms -->
                                <div>
                                    <label for="bedroom"
                                        class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                                    <div class="relative">
                                        <input type="number" id="bedroom" name="bedroom"
                                            class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bathrooms -->
                                <div>
                                    <label for="bathrooms"
                                        class="block text-sm font-medium text-gray-700 mb-1">Bathrooms</label>
                                    <input type="number" id="bathrooms" name="bathrooms"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <!-- Size -->
                                <div>
                                    <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Size (sq
                                        ft)</label>
                                    <input type="number" id="size" name="size"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="status"
                                        class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select id="status" name="status"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 h-[41.33px]">
                                        <option value="available">Available</option>
                                        <option value="sold">Sold</option>
                                        <option value="rented">Rented</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Location Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Location Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <!-- Street Address -->
                                <div class="lg:col-span-4">
                                    <label for="street" class="block text-sm font-medium text-gray-700 mb-1">Street
                                        Address</label>
                                    <input type="text" id="street" name="street"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <!-- City -->
                                <div>
                                    <label for="city"
                                        class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                    <input type="text" id="city" name="city"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <!-- State -->
                                <div>
                                    <label for="state"
                                        class="block text-sm font-medium text-gray-700 mb-1">State/Province</label>
                                    <input type="text" id="state" name="state"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                    <input type="text" id="country" name="country"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <!-- Postal Code -->
                                <div>
                                    <label for="postal_code"
                                        class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                                    <input type="text" id="postal_code" name="postal_code"
                                        class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        <input type="number" name="owner_id" value="{{ Auth::id() }}" hidden>
                        <!-- Description Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Description</h3>
                            <div>
                                <textarea id="description" name="description" rows="4"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Describe the property..."></textarea>
                            </div>
                        </div>

                        <!-- Images Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Property Images</h3>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-200 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to
                                                upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                    </div>
                                    <input type="file" name="images[]" multiple class="hidden" />
                                </label>
                            </div>
                            @error('images')
                                <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <p class="text-lg font-semibold text-gray-700 mb-4" id="agent_name"></p>
                        <input type="text" id="agent" name="agent_id" hidden>
                        <!-- Submit Button -->
                        <div x-data="{ agent: false }" class="flex justify-between">
                            
                            <div class="flex">
                                <button type="button" @click="agent=true"
                                    class="px-6 py-2.5 text-sm font-medium text-gray-50 bg-black border border-gray-300 rounded-lg hover:bg-gray-800 focus:ring-4 focus:ring-gray-200">
                                    Select Agent(Optional)
                                </button>
                            </div>

                            <div x-show="agent"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
                                <div @click.outside="isOpen = false"
                                    class="relative w-full max-w-4xl mx-4 my-8 bg-white rounded-xl shadow-lg max-h-[90vh]">
                                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                        <!-- Modal Header -->
                                        <div class="px-8 py-6 border-gray-100 flex flex-col">
                                            <h2 class="text-2xl font-bold text-gray-800">Agents</h2>
                                            <p class="mt-1 text-sm text-gray-500">Select agent to manage your
                                                property.</p>
                                        </div>
                                        <div
                                            class="px-8 py-6 border-b border-gray-100 flex flex-col justify-between items-center">
                                            <div
                                                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                                @forelse ($agents as $agent)
                                                <div class="border rounded-lg bg-white hover:scale-105 shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800 flex flex-col">
                                                    <div class="swiper-container flex-grow">
                                                        <div class="swiper-wrapper">
                                                            <!-- Swiper slides would go here -->
                                                        </div>
                                                    </div>
                                                    <div class="p-4 flex-grow">
                                                        <h3 class="font-semibold text-lg">{{ $agent->user->name }}</h3>
                                                        <p class="text-gray-600">
                                                            <i class="fas fa-building mr-1"></i>{{ $agent->agency_name }}
                                                        </p>
                                                        <p class="text-xl font-bold mt-2">{{ $agent->license_number }}</p>
                                                        <div class="flex items-center space-x-2 text-sm mt-4">
                                                            <span><i class="fas fa-user-tie"></i> {{ $agent->experience }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="p-4">
                                                        <button type="button"
                                                            class="block w-full text-center px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700 text-sm transition duration-300" @click="assignAgent({{ $agent->id }}, '{{ $agent->user->name }}');agent=false">Select</button>
                                                    </div>
                                                </div>  
                                                @empty

                                                <div class="col-span-full bg-white rounded-lg p-12 text-center dark:bg-gray-800">
                                                    <i class="fas fa-home text-6xl text-gray-300 mb-4 dark:text-gray-500"></i>
                                                    <p class="text-2xl font-semibold mb-2">No Agents yet </p>
                                                    
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-4">

                                <button type="button" onclick="closeModal()"
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-200">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                    Create Property
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header Section -->
                <div class="px-6 py-4 border-b border-gray-200 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-gray-800">Properties</h2>
                            <p class="mt-1 text-sm text-gray-600">Manage your property listings</p>
                        </div>

                        <!-- Filter Section -->
                        <div class="mt-4 md:mt-0 flex items-center space-x-4">
                            <div class="w-64">
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Filter by
                                    Type</label>
                                <select wire:model.live="selectedType" id="type"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 h-[41.33px]">
                                    <option value="">All Types</option>
                                    <option value="house">House</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="land">Land</option>
                                    <option value="commercial">Commercial</option>
                                </select>
                            </div>

                            <a onclick="openModal()"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 h-[41.33px]">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Add Property
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Property
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Location
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($properties as $property)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                @php
                                                    $images = App\Models\PropertyImage::where(
                                                        'property_id',
                                                        $property->id,
                                                    )->first();
                                                    // dd($images);
                                                @endphp
                                                @isset($images)
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ asset('storage/properties/' . $images->image_path) }}"
                                                        alt="{{ $property->title }}">
                                                @else
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-gray-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                    </div>
                                                @endisset
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $property->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $property->bedroom }} bed • {{ $property->bathrooms }} bath •
                                                    {{ $property->size }} sq ft
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $property->type === 'house'
                                            ? 'bg-blue-100 text-blue-800'
                                            : ($property->type === 'apartment'
                                                ? 'bg-green-100 text-green-800'
                                                : ($property->type === 'land'
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-purple-100 text-purple-800')) }}">
                                            {{ ucfirst($property->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">${{ number_format($property->price) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $property->city }}</div>
                                        <div class="text-sm text-gray-500">{{ $property->state }},
                                            {{ $property->country }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $property->status === 'available'
                                            ? 'bg-green-100 text-green-800'
                                            : ($property->status === 'sold'
                                                ? 'bg-red-100 text-red-800'
                                                : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($property->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">

                                            <a wire:model="id" href="/properties/{{ $property->id }}/edit"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>
                                            <button wire:click="deleteProperty({{ $property->id }})"
                                                class="text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No properties found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function assignAgent(agent_id, agent_name) {
            document.getElementById('agent').value = agent_id;
            document.getElementById('agent_name').textContent = `Selected Agent: ${agent_name}`;
        }

    </script>
</div>
