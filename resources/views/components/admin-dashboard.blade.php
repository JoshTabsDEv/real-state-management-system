<div class="flex h-screen">
    <main id="dashboardContent" class="flex-1 p-4 mx-auto w-full bg-gray-100 overflow-auto ml-0 ">
        <!-- Header -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center mb-6">
            <h1 class="text-2xl font-bold col-span-1 sm:col-span-2">Dashboard Overview</h1>
            <div class="col-span-1">
                <input type="text" placeholder="Search..." class="border rounded-lg px-4 py-2 w-full">
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white shadow-sm rounded-lg p-4">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <div class="text-3xl font-bold mt-2">{{ $userCount }}</div>
                <div class="text-sm text-green-500 mt-1">+20.1% from last month</div>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-4">
                <h2 class="text-lg font-semibold">Total Properties</h2>
                <div class="text-3xl font-bold mt-2">{{ $propertyCount }}</div>
                <div class="text-sm text-green-500 mt-1">+15.5% from last month</div>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-4">
                <h2 class="text-lg font-semibold">Appointments</h2>
                <div class="text-3xl font-bold mt-2">{{ $totalAppointments }}</div>
                <div class="text-sm text-green-500 mt-1">+7.2% from last week</div>
            </div>
        </div>

        <!-- Analytics Chart -->
        <div class="bg-white shadow-sm rounded-lg p-6 mt-6">
            <h2 class="text-lg font-semibold">Analytics Data</h2>
            <canvas id="analyticsChart" class="mt-4"></canvas>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white shadow-sm rounded-lg p-4 mt-6">
            <h2 class="text-lg font-semibold">Recent Activity</h2>
            <p class="text-sm text-gray-500 mb-4">Latest actions across the platform</p>
            <ul>
                <li class="flex justify-between py-2 border-b">
                    <span>New property listed by Agent John Doe</span>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </li>
                <li class="flex justify-between py-2 border-b">
                    <span>Appointment scheduled for Property #1234</span>
                    <span class="text-sm text-gray-500">5 hours ago</span>
                </li>
                <li class="flex justify-between py-2">
                    <span>New inquiry received for Property #5678</span>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </li>
            </ul>
        </div>
    </main>
  
</div>