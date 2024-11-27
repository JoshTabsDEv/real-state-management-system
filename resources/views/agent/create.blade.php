<!-- resources/views/agent/apply.blade.php -->
<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Apply to Become an Agent</h2>
    
        <form action="{{ route('apply.submit') }}" method="POST">
            @csrf
    
            <!-- Agency Name -->
            <div class="mb-4">
                <label for="agency_name" class="block text-sm font-medium text-gray-700">Agency Name</label>
                <input type="text" name="agency_name" id="agency_name" value="{{ old('agency_name') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Your agency name" />
                @error('agency_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- License Number -->
            <div class="mb-4">
                <label for="license_number" class="block text-sm font-medium text-gray-700">License Number</label>
                <input type="text" name="license_number" id="license_number" value="{{ old('license_number') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Your license number" />
                @error('license_number')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Experience -->
            <div class="mb-4">
                <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                <textarea name="experience" id="experience" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Tell us about your experience as an agent">{{ old('experience') }}</textarea>
                @error('experience')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
    
    </x-app-layout>