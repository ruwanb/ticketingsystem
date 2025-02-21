<div>

    <div class="w-full md:w-3/12 mb-4">
        <x-input-label for="search" :value="__('Search')" />
        <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="text" name="search" :value="old('search')" required
            autofocus autocomplete="search" />
    </div>



    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Ticket ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    @if ($ticket->status == 'completed')
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        @else
                        <tr class="bg-red-100 border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    @endif

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $ticket->reference }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->status }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $ticket->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $ticket->user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $ticket->created_at }}
                    </td>
                    <td>
                        <div class="flex gap-2 justify-center items-center">
                            <a href="{{ route('agent.tickets.show', $ticket)}}"><i></i> view</a>
                        </div>
                    </td>

                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        Sorry, There are no any tickets!
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="w-full py-5">
            {{ $tickets->links() }}
        </div>
    </div>

</div>
