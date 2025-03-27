<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ScreeningStoreRequest",
 *     description="Validates the request data for creating a new screening",
 *     type="object",
 *     required={"movie_id", "screening_time", "available_places"}
 * )
 */
class ScreeningStoreRequest extends FormRequest
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
            'movie_id' => 'required|exists:movies,id',
            'screening_time' => 'required|date_format:Y-m-d H:i:s',
            'available_places' => 'required|integer|min:1',
        ];
    }
}
