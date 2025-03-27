<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="MovieStoreRequest",
 *     description="Validates the request data for creating a new movie",
 *     type="object",
 *     required={"title", "description", "rating", "language", "poster_url"}
 * )
 */
class MovieStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|in:G,PG,PG-13,R',
            'language' => 'required|string|size:2|alpha',
            'poster_url' => 'required|url',
        ];
    }
}
