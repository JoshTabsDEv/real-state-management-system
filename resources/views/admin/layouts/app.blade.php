<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />


        <link rel="icon" href="{{ asset('storage/original-1.png') }}" type="image/png" />
        <!-- <script src="./tailwind3.js"></script> -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
          rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <wireui:scripts />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <livewire:styles />

        <title>EstateSphere</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            [x-cloak] { display: none !important; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Geist'] antialiased">
        @if (session('success'))
            <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="min-h-screen bg-gray-100">
       
            <livewire:sidebar/>
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
            <livewire:scripts />
        </div>
    </body>
</html>
<script>
    const ctx = document.getElementById('analyticsChart').getContext('2d');
    const analyticsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'User Growth',
                data: [120, 190, 300, 500, 200, 300],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    grid: {
                        color: '#e5e7eb'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>
