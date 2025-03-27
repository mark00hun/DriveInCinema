<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ScreeningUpdateRequest",
 *     description="Validates the request data for updating an existing screening",
 *     type="object",
 *     required={}
 * )
 */
class ScreeningUpdateRequest extends FormRequest
{
    /**
     * @OA\Property(
     *     property="movie_id",
     *     type="integer",
     *     description="Unique identifier of the movie",
     *     example="1"
     * )
     * @OA\Property(
     *     property="screening_time",
     *     type="string",
     *     format="date-time",
     *     description="Time of the screening",
     *     example="2025-03-15 20:30:00"
     * )
     * @OA\Property(
     *     property="available_places",
     *     type="integer",
     *     description="Number of available places",
     *     example="15"
     * )
     */
    public function rules(): array
    {
        return [
            'movie_id' => 'sometimes|exists:movies,id',
            'screening_time' => 'sometimes|date_format:Y-m-d H:i:s',
            'available_places' => 'sometimes|integer|min:1',
        ];
    }
}
