<div class="mb-6">
    <label for="date_input">{{ __('date') }}</label> <!-- todo translate -->
    <input id="date_input" name="date" type="date"
           value="{{ old('date', $csvData->date) }}"/>
    <div class="text-red-600">
        @if($errors->has('date'))
            {{ $errors->first('date') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="personal_number_input">{{ __('personal_number') }}</label> <!-- todo translate -->
    <input id="personal_number_input" name="personal_number" type="text"
           value="{{ old('personal_number', $csvData->personal_number) }}"/>
    <div class="text-red-600">
        @if($errors->has('personal_number'))
            {{ $errors->first('personal_number') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="hours_input">{{ __('hours') }}</label> <!-- todo translate -->
    <input id="hours_input" name="hours" type="number" step="0.01" lang="nl-nl"
           value="{{ old('hours', $csvData->hours / 60) }}"/>
    <!-- todo way of parsing hours without directly modifying it? -->
    <div class="text-red-600">
        @if($errors->has('hours'))
            {{ $errors->first('hours') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="hour_code_input">{{ __('hour_code') }}</label> <!-- todo translate -->
    <input id="hour_code_input" name="hour_code" type="text"
           value="{{ old('hour_code', $csvData->hour_code) }}"/>
    <div class="text-red-600">
        @if($errors->has('hour_code'))
            {{ $errors->first('hour_code') }}
        @endif
    </div>
</div>

