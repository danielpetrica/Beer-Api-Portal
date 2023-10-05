<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Token created') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900 dark:text-gray-100 py-6 px-6">
                    <span class="text-4xl pb-3"> {{ __('New token value:')}}</span>
                    <div class="text-gray-900 dark:text-gray-100 py-5">
                        <pre class="dark:bg-gray-600 bg-gray-600  text-white font-bold rounded inline-block"
                        >{{$token->plainTextToken }}</pre>
                       </div>

                    <div class="text-gray-900 dark:text-gray-100 ">
                        {{ __('This is your token, copy it and save it somewhere safe. You will not be able to see it again.') }}
                    </div>


                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-gray-500">
                        <a class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded
                        " href="{{route('dashboard')}}"> {{ __('Tornare alla dashboard') }} </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
