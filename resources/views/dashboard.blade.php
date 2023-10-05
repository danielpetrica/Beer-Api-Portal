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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count(Auth::user()->tokens))
                    @foreach( Auth::user()->tokens as $token)
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ $token->name }} -
                            <span class="text-gray-500">{{ $token->created_at->diffForHumans() }}</span>
                            {{-- Token delete --}}
                            <form method="POST" action="{{ route('token.destroy', $token->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="
                                    bg-red-500
                                    hover:bg-blue-700
                                    text-white
                                    font-bold
                                    py-2
                                    px-4
                                    rounded
                                ">{{ __('Delete') }}</button>
                            </form>

                        </div>
                    @endforeach
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        {{-- Button with Post requet to generate the tokken--}}
                        <form method="POST" action="{{ route('token.create') }}">
                            @csrf
                            <button class="
                                bg-green-500
                                hover:bg-blue-700
                                text-white
                                font-bold
                                py-2
                                px-4
                                rounded
                            ">{{ __('Generate a new token') }}</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
