<!-- resources/views/agent/apply.blade.php -->
<x-admin-app-layout>
    <x-section-div-style>
        <!-- admin/agent-agents/index.blade.php -->

        <div class="py-12 bg-gray-50">
            <div x-data="{ isModalOpen: false, experienceText: '' }" class="overflow-x-auto" x-cloak>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Header Section -->
                    <div class="px-6 py-4 border-b border-gray-200 bg-white">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold text-gray-800">Agents</h2>
                                <p class="mt-1 text-sm text-gray-600">List of active agents</p>
                            </div>
        
                            <!-- Filter Section -->
                            <div class="mt-4 md:mt-0 flex items-center space-x-4">
                                {{-- <div class="w-64">
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
                                </div> --}}
        
                                {{-- <a onclick="openModal()"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 h-[41.33px]">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Property
                                </a> --}}
                            </div>
                        </div>
                    </div>
        
                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">User ID</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Agency Name</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">License Number</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Experience</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($agents as $application)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $application->user_id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $application->agency_name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $application->license_number ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700 border-b">
                                <!-- View Button triggers the modal with experience content -->
                                <button m
                                    @click="isModalOpen = true; experienceText = '{{ $application->experience ?? 'No details provided' }}'"
                                    class="text-blue-600 hover:underline">
                                    View
                                </button>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700 border-b">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $application->is_approved ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $application->is_approved ? 'Approved' : 'Pending' }}
                                </span>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-500">
                                <div class="bg-yellow-100 border border-yellow-300 p-4 rounded-md">
                                    <strong class="font-semibold text-yellow-700">No agents found.</strong> 
                                    There are no pending agent applications at the moment.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                            </tbody>
                        </table>
                    </div>
        
                   
                    <div x-show="isModalOpen" @click.self="isModalOpen = false" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Experience Details</h3>
                                <button @click="isModalOpen = false" class="text-gray-500 hover:text-gray-700">&times;</button>
                            </div>
                            <div x-text="experienceText" class="text-sm text-gray-700"></div>
                            <div class="mt-4 text-right">
                                <button @click="isModalOpen = false" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Close</button>
                            </div>
                        </div>
            </div> 
                </div>
            </div>
        </div>

        <!-- Include Alpine.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    </x-section-div-style>
    <x-show-hide-sidebar toggleButtonId="toggleButton" sidebarContainerId="sidebarContainer"
        dashboardContentId="dashboardContent" toggleIconId="toggleIcon" />

</x-admin-app-layout>
