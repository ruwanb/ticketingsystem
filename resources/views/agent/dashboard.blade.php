<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center gap-10 w-full">
                    <div class="p-10 flex-col items-center justify-center rounded-xl bg-gray-200">
                        <h2 class="font-bold text-xl">All Tickets</h2>
                        <p>{{ $all }}</p>
                    </div>

                    <div class="p-10 flex-col items-center justify-center rounded-xl bg-red-200">
                        <h2 class="font-bold text-xl">Pending Tickets</h2>
                        <p>{{ $pending }}</p>
                    </div>

                    <div class="p-10 flex-col items-center justify-center rounded-xl bg-green-200">
                        <h2 class="font-bold text-xl">Completed Tickets</h2>
                        <p>{{ $completed }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-agent-layout>