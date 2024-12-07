<x-guest-layout>
    <!-- Main Content Container (removed duplicate container from guest layout) -->
    <div class="space-y-6">
        <!-- Custom Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('storage/original-1.png') }}" class="mx-auto h-20 w-20 text-indigo-600" alt="logo">
            <h2 class="mt-4 text-2xl font-bold text-gray-900">Welcome back</h2>
            <p class="mt-2 text-sm text-gray-600">Please sign in to your account</p>
        </div>

        <!-- Status Message -->
        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 p-4 animate-fade-in-down">
                <p class="text-sm text-green-700">{{ session('status') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <!-- Email Input -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative rounded-md shadow-sm">
                    <input type="email" name="email" id="email" 
                        value="{{ old('email') }}"
                        class="block w-full rounded-md border-gray-300 pr-24 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150 ease-in-out @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                        placeholder="Enter your email">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <span class="text-gray-500 sm:text-sm pr-3">@gmail.com</span>
                    </div>
                </div>
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" 
                        class="block w-full rounded-md border-gray-300 pr-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150 ease-in-out @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                        placeholder="Enter your password">
                    <button type="button" onclick="togglePassword()" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition duration-150 ease-in-out hover:text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" id="eye-icon" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember_me" 
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" 
                            class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                            Forgot your password?
                        </a>
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                    class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm transition duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Sign in
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center text-sm">
                <span class="text-gray-600">Don't have an account?</span>
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                    Register now
                </a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</x-guest-layout>