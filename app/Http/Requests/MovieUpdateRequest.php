<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="MovieUpdateRequest",
 *     description="Validates the request data for updating an existing movie",
 *     type="object",
 *     required={}
 * )
 */
class MovieUpdateRequest extends FormRequest
{
    /**
     * @OA\Property(
     *     property="title",
     *     type="string",
     *     description="The title of the movie",
     *     example="The Matrix"
     * )
     *
     * @OA\Property(
     *     property="description",
     *     type="string",
     *     description="A short description of the movie",
     *     example="A hacker discovers the true nature of reality."
     * )
     *
     * @OA\Property(
     *     property="rating",
     *     type="string",
     *     description="The movie's age rating",
     *     enum={"G", "PG", "PG-13", "R", "NC-17"},
     *     example="PG-13"
     * )
     *
     * @OA\Property(
     *     property="language",
     *     type="string",
     *     description="Language code (e.g., 'en' for English, 'fr' for French)",
     *     example="en"
     * )
     *
     * @OA\Property(
     *     property="poster_url",
     *     type="string",
     *     format="uri",
     *     description="URL of the movie poster",
     *     example="https://via.placeholder.com/640x480.png/0099dd?text=poster"
     * )
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'nullable|in:G,PG,PG-13,R',
            'language' => 'nullable|string|max:100',
            'poster_url' => 'nullable|url',
        ];
    }
}
