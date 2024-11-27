
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Properties') }}
            </h2>
            <a href="{{ route('admin.properties.create') }}" 
               class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Add Property
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($properties as $property)
                <div x-data="{ isModalOpen{{$property->id}}: false }" class="overflow-x-auto bg-white shadow-md sm:rounded-lg">
            @endforeach
           
            <div class="overflow-x-auto ">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">Title</th>
                            <th class="px-6 py-3 text-left">Type</th>
                            <th class="px-6 py-3 text-left">Price</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Property Features</th>
                            <th class="px-6 py-3 text-left">Address</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($properties as $property)
                            <tr>
                                <td class="px-6 py-4">{{ $property->title }}</td>
                                <td class="px-6 py-4">{{ $property->type }}</td>
                                <td class="px-6 py-4">${{ number_format($property->price) }}</td>
                                <td class="px-6 py-4">{{ $property->status }}</td>
                                <td class="px-4 py-2 text-sm">
                                   
                                    <button 
                                        @click="isModalOpen{{$property->id}} = true"
                                        class="text-blue-600 hover:underline">
                                        View
                                    </button>
                                </td>
                                <td class="px-6 py-4">{{ $property->address }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.properties.edit', $property) }}" 
                                       class="text-blue-600 hover:text-blue-900">Edit</a>
                                    
                                    <form action="{{ route('admin.properties.destroy', $property) }}" 
                                          method="POST" 
                                          class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <div x-show="isModalOpen{{$property->id}}" @click.self="isModalOpen = false" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                                <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold text-gray-800">Property Features</h3>
                                        <button @click="isModalOpen{{$property->id}} = false" class="text-gray-500 hover:text-gray-700">&times;</button>
                                    </div>
                                    <div class="space-y-2">
                                        <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                                        <p><strong>Bedrooms:</strong> {{ $property->bedroom }}</p>
                                        <p><strong>Size:</strong> {{ $property->size }}  <strong>sqm</strong></p>
                                    </div>
                                    <div class="mt-4 text-right">
                                        <button @click="isModalOpen{{$property->id}} = false" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Close</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
        
            </div>              
            <div class="mt-4">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</x-app-layout>