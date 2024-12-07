<!-- resources/views/admin/dashboard.blade.php -->
<x-admin-app-layout>
    <x-section-div-style>
        <x-admin-dashboard :propertyCount="$stats['total_properties']" :userCount="$stats['total_users']" :totalAppointments="$stats['total_appointments']" />
    </x-section-div-style>

    <x-show-hide-sidebar toggleButtonId="toggleButton" sidebarContainerId="sidebarContainer"
        dashboardContentId="dashboardContent" toggleIconId="toggleIcon" />
</x-admin-app-layout->
