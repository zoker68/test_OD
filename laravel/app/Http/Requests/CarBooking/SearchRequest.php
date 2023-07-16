<?php

namespace App\Http\Requests\CarBooking;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'model' => 'string|max:50',
            'comfort' => 'exists:comfort_categories,id',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
        ];
    }
}
