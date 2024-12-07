<div>
    <div class="py-12 bg-gray-50" x-data="{ isModalOpen: false }">
        <div class="overflow-x-auto" x-cloak>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Header Section -->
                    <div class="px-6 py-4 border-b border-gray-200 bg-white">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold text-gray-800">Appointment List</h2>
                                <p class="mt-1 text-sm text-gray-600">Manage your appointments</p>
                            </div>

                            <!-- Filter Section -->
                            <div class="mt-4 md:mt-0 flex items-center space-x-4">
                                <input type="text" wire:model.live="search" placeholder="Search..."
                                    class="border rounded px-3 py-2">
                            </div>
                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th wire:click="sortBy('user.name')"
                                        class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b cursor-pointer">
                                        User Name</th>
                                    <th wire:click="sortBy('property.title')"
                                        class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b cursor-pointer">
                                        Property Title</th>
                                    <th wire:click="sortBy('date')"
                                        class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b cursor-pointer">
                                        Date</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($appointments as $appointment)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 text-sm text-gray-700 border-b">
                                            {{ $appointment->user->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 border-b">
                                            {{ $appointment->property->title }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $appointment->date }}
                                        </td>
                                        <td class="px-2 py-1 text-sm text-gray-700 border-b">
                                            <button
                                                @click="isModalOpen = true; @this.selectAppointment({{ json_encode($appointment) }})"
                                                class="px-2 py-1 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500">
                                            <div class="bg-yellow-100 border border-yellow-300 p-4 rounded-md">
                                                <strong class="font-semibold text-yellow-700">No appointments
                                                    found.</strong>
                                                There are no appointments at the moment.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal for Viewing Appointment Details -->
                    <div x-show="isModalOpen" @click.self="isModalOpen = false"
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Appointment Details</h3>
                                <button @click="isModalOpen = false"
                                    class="text-gray-500 hover:text-gray-700">&times;</button>
                            </div>
                            <div class="text-sm text-gray-700">
                                <p><strong>User Name:</strong> <span x-text="selectedAppointment.user.name"></span></p>
                                <p><strong>Property Title:</strong> <span
                                        x-text="selectedAppointment.property.title"></span></p>
                                <p><strong>Date:</strong> <span x-text="selectedAppointment.date"></span></p>
                                <!-- Add additional fields as necessary -->
                            </div>
                            <div class="mt-4 text-right">
                                <button @click="isModalOpen = false"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
