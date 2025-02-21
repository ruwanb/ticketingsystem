<div>
    @if ($formContainer)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 flex flex-col gap-5"> 

                    <!-- Reference -->
                    <div>
                        <x-input-label for="reference" :value="__('Enter Your Ticket Number')" />
                        <x-text-input wire:model.live="reference" id="reference" class="block mt-1 w-full" type="text" name="reference"
                            :value="old('reference')" required autofocus />
                    </div>

                    <x-primary-button wire:click="submit" class="text-center">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 flex justify-center">
                    <a href="{{ route('tickets.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Open Ticket') }}
                    </a>

                    <x-primary-button wire:click="showFormContainer" class="ms-3">
                        {{ __('Check Status') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif
</div>
