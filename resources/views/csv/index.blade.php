<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('csv') }}
        </h2>
        <a href="{{ route('csvs.create') }}">
            {{ __('create') }}
        </a>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-results-counter :resource="$csvs"/>
            </div>
        </div>
    </div>

    @foreach($csvs as $csv) <!-- todo component? -->
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-xl">
                        <a href="{{ route('csvs.show', $csv) }}">
                            {{ $csv->file_name }}
                        </a>
                    </div>
                    <div> <!-- todo fix styling -->
                       {{ __('data') }}: {{ count($csv->data) }} <!-- todo translate -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
