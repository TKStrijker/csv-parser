<div class="mb-6">
    <label for="file_name_input">{{ __('file name') }}</label> <!-- todo translate -->
    <input id="file_name_input" name="file_name" type="text"
           value="{{ old('file_name', $csv->file_name) }}"/>
    <div class="text-red-600">
        @if($errors->has('file_name'))
            {{ $errors->first('file_name') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="file_input">{{ __('file') }}</label> <!-- todo translate -->
    <input id="file_input" name="file" type="file" accept=".csv" {{ empty($csv->id) ? '' : 'disabled' }}/>
    <div class="text-red-600">
        @if($errors->has('file'))
            {{ $errors->first('file') }}
        @endif
    </div>
</div>
