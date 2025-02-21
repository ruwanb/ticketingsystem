<x-guest-layout>
    <h1 class="p-5 w-full text-center text-2xl">Customer Support System</h1>
    <div class="py-12">

        @livewire('check-ticket-status-livewire')

    </div>

    <!-- Login Link -->
    <div class="space-x-8 flex justify-center">
        <x-nav-link :href="route('agent.dashboard')" :active="request()->routeIs('agent.dashboard')">
            {{ __('Agent Login') }}
        </x-nav-link>
    </div>
</x-guest-layout>
