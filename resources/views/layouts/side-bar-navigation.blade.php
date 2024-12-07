<div id="sidebarContainer" class="fixed flex flex-col left-0 w-[68px] hover:w-48 md:w-48 bg-white h-full text-black transition-all duration-300 border-r-2 border-gray-300 dark:border-gray-600 z-50 sidebar">
    <div class="overflow-y-auto flex flex-col justify-between flex-grow">
        <div class="flex flex-col">
            <a href="{{route('admin.main-dashboard')}}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-200 active:bg-gray-300 transition-colors">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 9h18M3 15h18M3 21h18"></path></svg>
                Dashboard
            </a>
            <a href="{{route('admin.property.index')}}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-200 active:bg-gray-300 transition-colors">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 9h18M3 15h18M3 21h18"></path></svg>
                Property
            </a>
            <a href="{{route('admin.agent.index')}}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-200 active:bg-gray-300 transition-colors">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V3m-8 8V3m0 8l8 8m-8-8h8"></path></svg>
                Agents
            </a>
            <a href="#appointment" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-200 active:bg-gray-300 transition-colors">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8"></path></svg>
                Appointment
            </a>
        </div>
        <p class="mt-auto mb-4 px-5 py-3 hidden md:block text-center text-xs text-gray-500">Copyright @2024</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    tippy('[data-tippy-content]', {
        allowHTML: true,
        theme: 'light',
        placement: 'right-end',
    });
});
</script>