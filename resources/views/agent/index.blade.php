<!-- resources/views/agent/apply.blade.php -->
<x-app-layout>
    <!-- admin/agent-agents/index.blade.php -->
    <div x-data="{ isModalOpen: false, experienceText: '' }" class="overflow-x-auto">
        <table class="min-w-full table-auto bg-white border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">User ID</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Agency Name</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">License Number</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Experience</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agents as $agent)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $agent->user_id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $agent->agency_name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $agent->license_number ?? 'N/A' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">
                            <!-- View Button triggers the modal with experience content -->
                            <button 
                                @click="isModalOpen = true; experienceText = '{{ $agent->experience ?? 'No details provided' }}'"
                                class="text-blue-600 hover:underline">
                                View
                            </button>
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        {{ $agent->is_approved ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $agent->is_approved ? 'Approved' : 'Pending' }}
                            </span>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-500">
                            <div class="bg-yellow-100 border border-yellow-300 p-4 rounded-md">
                                <strong class="font-semibold text-yellow-700">No agents found.</strong> 
                                There are no pending agent agents at the moment.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    
        <!-- Modal -->
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
    
    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    
    
    </x-app-layout>