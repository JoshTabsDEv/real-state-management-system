<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Property') }}
        </h2>
    </x-slot>
    {{-- Properties --}}
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

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Description</label>
                            <input type="text" 
                                    name="description" 
                                    value="{{ old('description') }}" 
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="street" class="block text-sm font-medium text-gray-700">Street Address</label>
                            <input type="text" name="street" id="street" required
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
    
                        <!-- City -->
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" required
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
    
                        <!-- State/Province -->
                        <div class="mb-4">
                            <label for="state" class="block text-sm font-medium text-gray-700">State/Province</label>
                            <input type="text" name="state" id="state"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
    
                        <!-- Postal Code -->
                        <div class="mb-4">
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                            <input type="text" name="postal_code" id="postal_code"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
    
                        <!-- Country -->
                        <div class="mb-4">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input type="text" name="country" id="country" required
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <input type="text" hidden value="{{Auth::user()->id}}" name="owner_id">

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
                            <select name="type" class="w-full mt-1 border-gray-300 rounded-md shadow-sm h-[41.33px]">
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                                <option value="land">Land</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Price</label>
                            <input type="number" 
                                    name="price" 
                                    value="{{ old('price') }}" 
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">No. Bedrooms</label>
                            <input type="number" 
                                    name="bedroom" 
                                    value="{{ old('bedroom') }}" 
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('bedroom')" class="mt-2" />
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">No. Bathrooms</label>
                            <input type="number" 
                                    name="bathrooms" 
                                    value="{{ old('bathrooms') }}" 
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('bathrooms')" class="mt-2" />
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Size</label>
                            <input type="number" 
                                    name="size" 
                                    value="{{ old('size') }}" 
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('size')" class="mt-2" />
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="w-full mt-1 border-gray-300 rounded-md shadow-sm h-[41.33px]">
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="rented">Rented</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        {{-- <input type="text" hidden value = 0 name="is_published"> --}}

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
    {{-- end of Properties --}}

    {{-- Agents --}}
       @include('auth.register')
    {{-- end of Agents --}}
</x-app-layout>