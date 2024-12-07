<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div id="createModal"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto hidden">
                <div @click.outside="isOpen = false" class="bg-white  p-8 w-full max-w-md">
                    
                    <div class="overflow-hidden">
                        <div class="relative block" onclick="closeModal()">
                            <button id="closeModal"
                                class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <h1 class="text-2xl font-bold mb-6">Apply to Become an Agent</h1>
                        <form action="{{ route('client.apply.submit') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="agency_name" class="block font-medium mb-2">Agency Name</label>
                                <input type="text" name="agency_name" id="agency_name"
                                    value="{{ old('agency_name') }}" class="border rounded-md px-3 py-2 w-full"
                                    placeholder="Enter your agency name" />
                                @error('agency_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="license_number" class="block font-medium mb-2">License Number</label>
                                <input type="text"name="license_number" id="license_number"
                                    value="{{ old('license_number') }}" class="border rounded-md px-3 py-2 w-full"
                                    placeholder="Enter your license number" />
                                @error('license_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="experience" class="block font-medium mb-2">Experience</label>
                                <textarea name="experience" id="experience" class="border rounded-md px-3 py-2 w-full" rows="3"
                                    placeholder="Tell us about your experience as an agent"></textarea>
                                @error('experience')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="mb-6">
                    <label for="details" class="block font-medium mb-2">Provide details about your experience in the
                        field</label>
                    <textarea id="details" class="border rounded-md px-3 py-2 w-full" rows="3"
                        placeholder="Provide details about your experience in the field"></textarea>
                </div> --}}
                            <button type="submit"
                                class="bg-black text-white rounded-md px-4 py-2 w-full hover:bg-gray-800">Submit
                                Application</button>
                        </form>
                    </div>
                </div>
            </div>



            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
            <!-- Apply as Agent Button -->
            <div>
                <a onclick="openModal()"
                    class="mt-6 px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-700 transition duration-200 shadow-md">
                    Apply as Agent
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Information Card -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-300">

                <h3 class="text-lg font-semibold mb-4 text-gray-700">Update Profile Information</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Update Card -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-300">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Change Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-red-300">
                <h3 class="text-lg font-semibold mb-4 text-red-600">Delete Account</h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>


        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
