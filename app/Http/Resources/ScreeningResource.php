<?php

namespace App\Http\Resources;

use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="ScreeningResource",
 *     description="Represents a screening entity",
 *     type="object"
 * )
 */
class ScreeningResource extends JsonResource
{
    /**
     * @var Screening
     */
    public $resource;

    /**
     * @OA\Property(
     *     property="id",
     *     type="integer",
     *     description="Unique identifier of the screening",
     *     example="1"
     * )
     * @OA\Property(
     *     property="movie_id",
     *     type="integer",
     *     description="Unique identifier of the movie",
     *     example="3"
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
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'movie_id' => $this->resource->movie_id,
            'screening_time' => $this->resource->screening_time->format('Y-m-d H:i:s'),
            'available_places' => $this->resource->available_places,
        ];
    }
}
