<?php

namespace App\Http\Resources;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="MovieResource",
 *     description="Represents a movie entity",
 *     type="object"
 * )
 */
class MovieResource extends JsonResource
{
    /**
     * @var Movie
     */
    public $resource;

    /**
     * @OA\Property(
     *     property="id",
     *     type="integer",
     *     description="Unique identifier of the movie",
     *     example="1"
     * )
     * @OA\Property(
     *     property="title",
     *     type="string",
     *     description="The title of the movie",
     *     example="The Matrix"
     * )
     * @OA\Property(
     *     property="description",
     *     type="string",
     *     description="A short description of the movie",
     *     example="A hacker discovers the true nature of reality."
     * )
     * @OA\Property(
     *     property="rating",
     *     type="string",
     *     description="The movie's age rating",
     *     enum={"G", "PG", "PG-13", "R", "NC-17"},
     *     example="PG-13"
     * )
     * @OA\Property(
     *     property="language",
     *     type="string",
     *     description="Language code (e.g., 'en' for English, 'fr' for French)",
     *     example="en"
     * )
     * @OA\Property(
     *     property="poster_url",
     *     type="string",
     *     format="uri",
     *     description="URL of the movie poster",
     *     example="https://via.placeholder.com/640x480.png/0099dd?text=poster"
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'rating' => $this->resource->rating,
            'language' => $this->resource->language,
            'poster_url' => $this->resource->poster_url,
        ];
    }
}
