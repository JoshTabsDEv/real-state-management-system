<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <wireui:scripts />
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Additional Styles -->
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .bg-pattern {
            background-color: #f3f4f6;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239CA3AF' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="font-['Geist'] text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-pattern">
        <!-- Logo Section -->
        {{-- <div class="fade-in">
            <a href="/" class="flex items-center justify-center">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 transition duration-300 ease-in-out hover:text-gray-700" />
            </a>
        </div> --}}

        <!-- Main Content -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg fade-in">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500 fade-in">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>

    <!-- Loading Indicator -->
    <div x-data="{ loading: false }" 
         @loading.window="loading = $event.detail.loading"
         x-show="loading" 
         x-cloak
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-white"></div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" 
         class="fixed top-4 right-4 z-50 space-y-4"
         x-data="{ notifications: [] }"
         @notification.window="notifications.push($event.detail)">
        <template x-for="notification in notifications" :key="notification.id">
            <div x-show="true"
                 x-transition:enter="transform ease-out duration-300 transition"
                 x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                 x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900" x-text="notification.message"></p>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <button @click="notifications = notifications.filter(n => n.id !== notification.id)" 
                                    class="rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    @stack('scripts')
</body>
</html>