<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.0/cdn.js" defer></script>

<div class="transition-all duration-300 min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-zinc-300 text-black dark:text-white">
    <div id="dashboardContent" class="h-full mb-5 transition-all duration-300">
        <div class="max-w-full mx-auto">
            <div class="flex w-full p-2 bg-white justify-between items-center sticky top-0 z-10">
                <div class="flex items-center">
                    <img src="{{ asset('storage/original-1.png') }}" class="h-10 w-10" alt="logo">
                    <div class="ml-2 mt-0.5 font-semibold text-xs text-black uppercase sm:text-xs sm:pt-[7px] truncate md:text-md lg:text-md xl:text-md">
                        EstateSphere
                    </div>
                </div>
                <div class="relative" x-cloak x-data="{ open: false }">
                    <div @click="open = !open" class="mr-5 cursor-pointer">
                        <div class="flex justify-center p-1">
                            <ul class="flex">
                                <div class="relative inline-flex w-fit">
                                    <div class="absolute bottom-auto left-0 right-auto top-0 z-10 inline-block -translate-y-1/2 -translate-x-2/4 rotate-0 skew-x-0 skew-y-0 mt-[1px] scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-teal-500 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-white">
                                        99+
                                    </div>
                                    <i id="userIcon" class="fa-solid fa-bell fa-white px-3 py-2 rounded-md"></i>
                                </div>
                                <li>
                                    <a href="#" class="block">
                                        <img id="imagePreview" src="{{ asset('assets/img/user.png') }}" class="rounded-lg w-9 h-9 sm:w-9 sm:h-9 mx-auto">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 w-48 bg-white rounded-md shadow-lg py-2 z-20">
                        <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                            <i class="fa-regular fa-user"></i> Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>

<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Tippy tooltip
        tippy('#userIcon', {
            content: 'Notifications',
            placement: 'left-start', // Adjust placement as needed
            arrow: true, // Show arrow
            theme: 'light', // Choose a theme: 'light', 'dark', etc.
        });

        tippy('#userImage', {
            content: 'User Settings',
            placement: 'left-start', // Adjust placement as needed
            arrow: true, // Show arrow
            theme: 'light', // Choose a theme: 'light', 'dark', etc.
        });
    });
</script>