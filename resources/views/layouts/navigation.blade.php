<div x-data="{ darkMode: false }" :class="{ 'bg-gray-900 text-white': darkMode, 'bg-gray-100 text-black': !darkMode }" class="container mx-auto px-6 py-4 font-sans">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md rounded-lg p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-gray-800 text-2xl font-bold">Property Listings</h1>
            <div class="flex items-center space-x-6">
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Websites</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Emails</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Domains</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">VPS</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Billing</a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                            <svg class="fill-current h-4 w-4 inline-block ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </nav>

    <!-- Action Buttons -->
    <div class="mt-4">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Get New Hosting Plan</button>
        <button class="ml-4 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Add Website</button>
        <button class="ml-4 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Migrate Website</button>
    </div>
</div>