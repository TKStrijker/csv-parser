<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $csv->file_name }}
        </h2>

        <div>
            <a href="{{ route('csvs/export', [$csv->id]) }}">
                {{ ucfirst(trans('actions.export')) }}
            </a>
        </div>

        <a href="{{ route('csvs/edit', [$csv->id]) }}">
            {{ ucfirst(trans('actions.edit')) }}
        </a>

        <form action="{{ route('csvs/delete', [$csv->id]) }}" method="POST">
            @csrf
            @method('DELETE')

            <button>{{ ucfirst(trans('actions.delete')) }}</button>
        </form>

    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('data.create', $csv) }}" class="text-xl">
                    {{ ucfirst(trans('actions.create')) }}
                </a>
                <x-results-counter :resource="$csv->data"/>
            </div>
        </div>
    </div>

    @foreach($csv->data as $data)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('data.edit', ['csv' => $csv, 'data' => $data]) }}">
                        {{ ucfirst(trans('actions.edit')) }}
                    </a>
                    <form action="{{ route('data.destroy', ['csv' => $csv, 'data' => $data]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button>{{ ucfirst(trans('actions.delete')) }}</button>
                    </form>
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ ucfirst(trans_choice('nouns.year', 1)) }}: {{ $data->year }} <br>
                        {{ ucfirst(trans_choice('nouns.week', 1)) }}: {{ $data->week }} <br>
                        {{ ucfirst(trans_choice('nouns.date', 1)) }}: {{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }} <br>
                        {{ ucfirst(trans_choice('nouns.personal number', 1)) }}: {{ $data->personal_number }} <br>
                        <x-integer-to-time :time="$data->hours"/>
                        {{ ucfirst(trans_choice('nouns.hour code', 1)) }}: {{ $data->hour_code }} <br>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
