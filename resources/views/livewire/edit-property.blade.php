<div>
    {{-- Be like water. --}}
    @if (session('success'))
            <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
                {{ session('success') }}
            </div>
        @endif
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto ">
        <div class="relative w-full max-w-4xl mx-4 my-8 bg-white rounded-xl shadow-lg max-h-[90vh]">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Modal Header -->
                <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Update Property
                        </h2>
                        <p class="mt-1 text-sm text-gray-500">Fill in the details below to
                            update property.</p>
                    </div>

                </div>


                <!-- Form Content -->
                <form wire:submit='updateProperty' method="POST" enctype="multipart/form-data" class="p-10 mx-6">
                    @csrf

                    <!-- Main Information Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Basic
                            Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Property
                                    Title</label>
                                <input type="text" id="title" wire:model="title"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('title')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price
                                    (₱)
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">₱</span>
                                    <input type="number" id="price" wire:model="price"
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

                                <select id="type" wire:model="type"
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
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Property
                            Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Bedrooms -->
                            <div>
                                <label for="bedroom"
                                    class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                                <div class="relative">
                                    <input type="number" id="bedroom" wire:model="bedroom"
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
                                <input type="number" id="bathrooms" wire:model="bathrooms"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Size -->
                            <div>
                                <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Size
                                    (sq
                                    ft)</label>
                                <input type="number" id="size" wire:model="size"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select id="status" wire:model="status"
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
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Location
                            Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Street Address -->
                            <div class="lg:col-span-4">
                                <label for="street" class="block text-sm font-medium text-gray-700 mb-1">Street
                                    Address</label>
                                <input type="text" id="street" wire:model="street"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                <input type="text" id="city" wire:model="city"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- State -->
                            <div>
                                <label for="state"
                                    class="block text-sm font-medium text-gray-700 mb-1">State/Province</label>
                                <input type="text" id="state" wire:model="state"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="country"
                                    class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                <input type="text" id="country" wire:model="country"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <!-- Postal Code -->
                            <div>
                                <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Postal
                                    Code</label>
                                <input type="text" id="postal_code" wire:model="postal_code"
                                    class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                    <input type="number" wire:model="owner_id" value="{{ Auth::id() }}" hidden>
                    <!-- Description Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Description
                        </h3>
                        <div>
                            <textarea id="description" wire:model="description" rows="4"
                                class="w-full rounded-lg border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Describe the property..."></textarea>
                        </div>
                    </div>

                    <!-- Images Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Property
                            Images</h3>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-200 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX.
                                        800x400px)</p>
                                </div>
                                <input type="file" wire:model="images" multiple class="hidden" />
                            </label>
                        </div>
                        @error('images')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
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
                </form>
            </div>
        </div>
    </div>
</div>
