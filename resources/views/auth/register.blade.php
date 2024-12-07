<x-guest-layout>
    <!-- Main Content Container -->
    <div class="space-y-6">
        <!-- Custom Logo and Header -->
        <div class="text-center mb-8">
            <img src="{{ asset('storage/original-1.png') }}" class="mx-auto h-20 w-20 text-indigo-600" alt="logo">
            <h2 class="mt-4 text-2xl font-bold text-gray-900">Create an account</h2>
            <p class="mt-2 text-sm text-gray-600">Join us today</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <x-input
                    icon="user"
                    label="Name"
                    name="name"
                    placeholder="Enter your full name"
                    value="{{ old('name') }}"
                />
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input
                    icon="envelope"
                    label="Email"
                    name="email"
                    placeholder="Enter your email address"
                    value="{{ old('email') }}"
                />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <x-password 
                    label="Password" 
                    icon="key" 
                    name="password"
                    placeholder="Create a password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <x-password 
                    label="Confirm Password" 
                    icon="key" 
                    name="password_confirmation"
                    placeholder="Confirm your password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit and Login Link -->
            <div class="flex flex-col space-y-4">
                <x-primary-button class="w-full justify-center py-2">
                    {{ __('Register') }}
                </x-primary-button>

                <div class="text-center text-sm">
                    <span class="text-gray-600">Already have an account?</span>
                    <a href="{{ route('login') }}" 
                        class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                        {{ __('Sign in') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>