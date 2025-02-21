<x-guest-layout>
    <div class="py-4">
        <div class="mb-5">
            <a class="underline text-md text-gray-800 hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('tickets.index') }}">
                {{ __('Back to Home') }}
            </a>
        </div>
        <div class="w-full bg-purple-100 border border-gray-300 shadow-lg rounded-t-xl overflow-hidden">
            <div
                class="mb-4 p-2 text-white text-center {{ $ticket->status != 'completed' ? 'bg-red-500' : 'bg-green-500' }}">
                {{ $ticket->status }}
            </div>
            <table>
                <tr class="p-5">
                    <td class="px-[20px]">
                        Reference ID
                    </td>
                    <td>
                        {{ $ticket->reference }}
                    </td>
                </tr>
                <tr class="p-5">
                    <td class="px-[20px]">
                        Opened At
                    </td>
                    <td>
                        {{ $ticket->created_at }}
                    </td>
                </tr>
            </table>

            <div class="mt-10 p-5 text-bold">
                <p class="text-xl">Question</p>
                <p class="mt-5">{{ $ticket->question }}</p>
            </div>

            @if ($ticket->replies->count())
                <div class="p-5 bg-gray-200 text-bold">
                    <p class="text-xl">Replies</p>
                    @foreach ($ticket->replies as $reply)
                        <p class="mt-5">{{ $reply->reply }}</p>
                        <span class="text-xs text-gray-500">{{ $reply->created_at }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
