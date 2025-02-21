<x-agent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticket ID') }} - {{ $ticket->reference }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-5">
                <a class="underline text-md text-gray-800 hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('agent.tickets.index') }}">
                    {{ __('Back to Previous') }}
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="p-6 text-gray-900 flex gap-5 items-center justify-between {{ $ticket->status != 'completed' ? 'bg-red-200' : 'bg-green-200' }}">
                    <div class="flex gap-4 items-center">
                        <p class="font-bold">
                            Opened Date
                        </p>
                        <p>
                            {{ $ticket->created_at }}
                        </p>
                    </div>

                    <div class="flex gap-4 items-center">
                        <p class="font-bold">
                            Customer Name
                        </p>
                        <p>
                            {{ $ticket->user->name }}
                        </p>
                    </div>

                    <div class="flex gap-4 items-center">
                        <p class="font-bold">
                            Email
                        </p>
                        <p>
                            {{ $ticket->user->email }}
                        </p>
                    </div>

                    <div class="flex gap-4 items-center">
                        <p class="font-bold">
                            Status
                        </p>
                        <p>
                            {{ $ticket->status }}
                        </p>
                    </div>
                </div>

                <div class="p-5 bg-gray-200 text-bold">
                    <p class="text-xl">Question</p>
                    <p>{{ $ticket->question }}</p>
                </div>

                @if ($ticket->replies->count())
                    <div class="p-5 bg-gray-200 text-bold">
                        <p class="text-xl">Replies</p>
                        @foreach ($ticket->replies as $reply)
                            <p class="mt-5">{{ $reply->reply }}</p>
                            <span class="text-xs text-gray-500">{{ $reply->created_at }}</span>
                        @endforeach
                    </div>
                @else
                    <div class="p-5 bg-gray-200 text-bold">
                        <p class="text-xl">Reply</p>
                        <form method="POST" action="{{ route('agent.tickets.store', ['ticket_id' => $ticket->id]) }}">
                            @csrf

                            <!-- Reply -->
                            <div class="mt-2">
                                <x-text-area-input id="reply" class="block mt-1 w-full" type="text"
                                    name="reply" required />

                                <x-input-error :messages="$errors->get('reply')" class="mt-2" />
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                <div class="flex justify-end items-center">
                                    <x-primary-button class="ms-4">
                                        {{ __('Submit & Mark As Done') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    </div>

                @endif
            </div>
        </div>
    </div>
</x-agent-layout>
