<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <form action="{{ route('admin.properties.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                   <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                
                        </div>

                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" 
                                   name="price" 
                                   value="{{ old('price') }}" 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                   <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                
                        </div> --}}

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type</label>
                            <select name="type" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                                <option value="land">Land</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="rented">Rented</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Add other fields similarly -->

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Images</label>
                            <input type="file" 
                                   name="images[]" 
                                   multiple 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        </div>
                        <x-input-error :messages="$errors->get('images')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <button type="submit" 
                                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Create Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>