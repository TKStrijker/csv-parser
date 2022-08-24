<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $csv->file_name }}
        </h2>

        <div>
            <a href="{{ route('csvs.export', $csv) }}">
                {{ __('export') }}
            </a>
        </div>

        <a href="{{ route('csvs.edit', $csv) }}">
            {{ __('edit') }}
        </a>

        <form action="{{ route('csvs.destroy', $csv) }}" method="POST"> <!-- todo move into modal -->
            @csrf
            @method('DELETE')

            <button>delete</button>
        </form>

    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('data.create', $csv) }}" class="text-xl">
                    {{ __('create') }}
                </a>
                <x-results-counter :resource="$csvData"/>
            </div>
        </div>
    </div>

    @foreach($csvData as $data)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('data.edit', ['csv' => $csv, 'data' => $data]) }}">
                        {{ __('edit') }}
                    </a>
                    <form action="{{ route('data.destroy', ['csv' => $csv, 'data' => $data]) }}" method="POST">
                        <!-- todo move into modal -->
                        @csrf
                        @method('DELETE')

                        <button>delete</button>
                    </form>
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ __('year') }}: {{ $data->year }} <br>
                        {{ __('week') }}: {{ $data->week }} <br>
                        {{ __('date') }}: {{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }} <br>
                        {{ __('personal_number') }}: {{ $data->personal_number }} <br>
                        <x-integer-to-time :time="$data->hours"/>
                        {{ __('hour_code') }}: {{ $data->hour_code }} <br>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
