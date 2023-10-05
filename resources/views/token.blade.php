<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('New token value: ')}} - <div class="text-gray-500">{{ $token->plainTextToken  }}</div>

                    <div class="text-gray-500">
                        {{ __('This is your token, copy it and save it somewhere safe. You will not be able to see it again.') }}
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
