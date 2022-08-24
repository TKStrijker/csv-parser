<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // todo expand(?)
    {
        return [
            'date' => 'required|date',
            'personal_number' => 'required|integer',
            'hours' => 'required|numeric',
            'hour_code' => 'required|string',
        ];
    }
}
