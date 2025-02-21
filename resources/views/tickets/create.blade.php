<x-guest-layout>
    <h1 class="p-5 w-full text-center text-2xl">Open a Ticket</h1>
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')"
                required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Question -->
        <div class="mt-4">
            <x-input-label for="question" :value="__('Question')" />

            <x-text-area-input id="question" class="block mt-1 w-full" type="text" name="question" required />

            <x-input-error :messages="$errors->get('question')" class="mt-2" />
        </div>


        <div class="flex items-center justify-between mt-4">
            <div>
                <a class="underline text-md text-gray-800 hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('tickets.index') }}">
                    {{ __('Back to Home') }}
                </a>
            </div>
            <div class="flex justify-end items-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already Submit a Ticket?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
