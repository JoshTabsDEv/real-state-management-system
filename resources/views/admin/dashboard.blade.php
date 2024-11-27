<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <x-admin-dashboard  :propertyCount="$stats['total_properties']" :userCount="$stats['total_users']" :totalAppointments="$stats['total_appointments']" />
</x-app-layout>