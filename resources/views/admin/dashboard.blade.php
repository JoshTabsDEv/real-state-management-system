<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="text-gray-500">Total Users</div>
                    <div class="text-2xl font-bold">{{ $stats['total_users'] }}</div>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="text-gray-500">Total Properties</div>
                    <div class="text-2xl font-bold">{{ $stats['total_properties'] }}</div>
                </div>
                
                {{-- <div class="p-6 bg-white rounded-lg shadow">
                    <div class="text-gray-500">Total Agents</div>
                    <div class="text-2xl font-bold">{{ $stats['total_agents'] }}</div>
                </div> --}}
                
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="text-gray-500">Pending Appointments</div>
                    <div class="text-2xl font-bold">{{ $stats['pending_appointments'] }}</div>
                </div>
            </div>

            <!-- Recent Properties -->
            <div class="mt-8">
                <h3 class="mb-4 text-lg font-semibold">Recent Properties</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left">Title</th>
                                <th class="px-6 py-3 text-left">Price</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_properties'] as $property)
                            <tr>
                                <td class="px-6 py-4">{{ $property->title }}</td>
                                <td class="px-6 py-4">${{ number_format($property->price) }}</td>
                                <td class="px-6 py-4">{{ $property->status }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.properties.edit', $property) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>