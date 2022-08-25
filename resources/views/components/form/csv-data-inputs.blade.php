<div class="mb-6">
    <label for="date_input">{{ ucfirst(trans_choice('nouns.date', 1)) }}</label>
    <input id="date_input" name="date" type="date"
           value="{{ old('date', $csvData->date) }}"/>
    <div class="text-red-600">
        @if($errors->has('date'))
            {{ $errors->first('date') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="personal_number_input">{{ ucfirst(trans_choice('nouns.personal number', 1)) }}</label>
    <input id="personal_number_input" name="personal_number" type="text"
           value="{{ old('personal_number', $csvData->personal_number) }}"/>
    <div class="text-red-600">
        @if($errors->has('personal_number'))
            {{ $errors->first('personal_number') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="hours_input">{{ ucfirst(trans_choice('nouns.hour', 2)) }}</label>
    <input id="hours_input" name="hours" type="number" step="0.01" lang="nl-nl"
           value="{{ old('hours', $csvData->hours / 60) }}"/>
    <div class="text-red-600">
        @if($errors->has('hours'))
            {{ $errors->first('hours') }}
        @endif
    </div>
</div>

<div class="mb-6">
    <label for="hour_code_input">{{ ucfirst(trans_choice('hour code', 1)) }}</label>
    <input id="hour_code_input" name="hour_code" type="text"
           value="{{ old('hour_code', $csvData->hour_code) }}"/>
    <div class="text-red-600">
        @if($errors->has('hour_code'))
            {{ $errors->first('hour_code') }}
        @endif
    </div>
</div>

