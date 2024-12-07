<div class="flex flex-col md:flex-row">
    <!-- Hamburger Menu -->
    <button id="hamburger" class="md:hidden p-4 text-lg font-semibold flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
        Filters
    </button>

    <!-- Sidebar for Filters -->
    <div id="sidebar"
        class="fixed mt-10 top-0 left-0 h-full w-full md:w-1/4 p-4 bg-white border-r border-gray-200 overflow-y-auto transform -translate-x-full transition-transform duration-300 md:fixed md:top-0 md:left-0 md:translate-x-0 md:h-full md:shadow md:mt-14">
        <h2 class="text-lg font-bold mb-4">Filters</h2>
        <div class="flex justify-between items-center">
            <h3 class="text-md font-semibold mb-2 text-center">Price Range</h3>
            <button id="close-sidebar" class="md:hidden p-4 font-bold">
                X
            </button>
        </div>
        <select wire:model.live="priceRange"
            class="w-full text-xs sm:text-base px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-400 bg-white text-black">
            <option value="">Any Price</option>
            <option value="0-100000">₱0 - ₱100,000</option>
            <option value="100000-300000">₱100,000 - ₱300,000</option>
            <option value="300000-500000">₱300,000 - ₱500,000</option>

        </select>

        <h3 class="text-md font-semibold mt-6 mb-2">Property Type</h3>
        <select wire:model.live="propertyType"
            class="w-full text-xs sm:text-base px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-400 bg-white text-black">
            <option value="">All Types</option>
            <option value="house">House</option>
            <option value="apartment">Apartment</option>
            <option value="condo">Condo</option>
            <option value="townhouse">Townhouse</option>
        </select>

        <h3 class="text-md font-semibold mt-6 mb-2">Bedrooms</h3>
        <select wire:model.live="bedrooms"
            class="w-full px-4 text-xs sm:text-base py-2 border rounded-lg focus:ring-2 focus:ring-gray-400 bg-white text-black">
            <option value="">Any</option>
            <option value="1">1+</option>
            <option value="2">2+</option>
            <option value="3">3+</option>
            <option value="4">4+</option>
        </select>

        <h3 class="text-md font-semibold mt-6 mb-2">Search</h3>
        <input type="text" placeholder="Search by location or keyword..." wire:model.live.debounce.500ms="search"
            class="w-full text-xs sm:text-base pl-4 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-400 bg-white text-black">
    </div>

    <div class="w-1/4"></div>
    <!-- Main Content -->
    <div class="flex-grow md:w-3/4 p-4">
        <div class="flex justify-between mb-4">
            <span class="text-sm">Showing {{ $properties->firstItem() ?? 0 }} - {{ $properties->lastItem() ?? 0 }} of
                {{ $properties->total() ?? 0 }} properties</span>
            <select wire:model.live="sortBy" class="border rounded p-2 text-sm md:text-base">
                <option value="newest">Sort By: Newest</option>
                <option value="price_low_high">Price: Low to High</option>
                <option value="price_high_low">Price: High to Low</option>
                <option value="most_popular">Most Popular</option>
            </select>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($properties as $property)
                @php
                    $images = App\Models\PropertyImage::where('property_id', $property->id)->first();
                @endphp
                <div
                    class="border rounded-lg bg-white hover:scale-105 shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800 flex flex-col">
                    <div class="swiper-container flex-grow">
                        <div class="swiper-wrapper">

                            {{-- @foreach ($property->images as $image)
                                <div class="swiper-slide">
                                    <img data-src="{{ $image->url }}" alt="{{ $property->title }}" class="w-full h-48 object-cover swiper-lazy" loading="lazy">
                                </div>
                            @endforeach --}}

                            @isset($images)
                                <img class="h-auto max-h-25 w-full object-cover rounded-t-lg"
                                    src="{{ asset('storage/properties/' . $images->image_path) }}"
                                    alt="{{ $property->title }}">
                            @else
                                <div class="bg-gray-400 h-auto max-h-25 w-full object-cover rounded-t-lg">
                                    
                                </div>
                            @endisset
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="p-4 flex-grow">
                        <h3 class="font-semibold text-lg">{{ $property->title }}</h3>
                        <p class="text-gray-600"><i class="fas fa-map-marker-alt mr-1"></i>{{ $property->country }}</p>
                        <p class="text-xl font-bold mt-2">₱{{ number_format($property->price) }}</p>
                        <div class="flex items-center space-x-2 text-sm mt-4">
                            <span><i class="fas fa-bed"></i> {{ $property->bedroom }} Beds</span>
                            <span><i class="fas fa-bath"></i> {{ $property->bathrooms }} Baths</span>
                            <span><i class="fas fa-vector-square"></i> {{ $property->size }} sq ft</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <a wire:model="id" href="/properties/{{ $property->id }}/view"
                            class="block w-full text-center px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700 text-sm transition duration-300">View
                            Details</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-lg p-12 text-center dark:bg-gray-800">
                    <i class="fas fa-home text-6xl text-gray-300 mb-4 dark:text-gray-500"></i>
                    <p class="text-2xl font-semibold mb-2">No properties found</p>
                    <p>Try adjusting your search criteria</p>
                </div>
            @endforelse
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $properties->links() }}
        </div>
    </div>

</div>

<!-- JavaScript for Toggle Functionality -->
<script>
    const hamburgerButton = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const closeSidebarButton = document.getElementById('close-sidebar');

    const toggleSidebar = () => {
        sidebar.classList.toggle('-translate-x-full');
    };

    // Close sidebar when clicking the close button
    closeSidebarButton.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });

    // Toggle sidebar when clicking the hamburger button
    hamburgerButton.addEventListener('click', toggleSidebar);

    // Close sidebar when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !hamburgerButton.contains(event.target)) {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>
