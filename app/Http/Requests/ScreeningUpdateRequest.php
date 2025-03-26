<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ScreeningUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'movie_id' => 'sometimes|exists:movies,id',
            'screening_time' => 'sometimes|date_format:Y-m-d H:i:s',
            'available_seats' => 'sometimes|integer|min:1',
        ];
    }
}
