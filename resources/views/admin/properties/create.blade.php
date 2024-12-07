<x-app-layout>
        <x-slot livewire:model.live="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Add Property') }}
            </h2>
        </x-slot>
    
        @livewire('property-form')

        

        <livewire:properties-table />

    {{-- Agents --}}
       {{-- @include('auth.register') --}}
    {{-- end of Agents --}}
</x-app-layout>