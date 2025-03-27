<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Http\Resources\MovieResource;
use App\Repositories\MovieRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Tag(
 *     name="Movies",
 *     description="Movie management endpoints"
 * )
 */
class MovieController extends Controller
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/movies",
     *     summary="Get all movies",
     *     tags={"Movies"},
     *     @OA\Response(
     *         response=200,
     *         description="List of movies",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/MovieResource"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(
            MovieResource::collection($this->movieRepository->all()),
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Post(
     *     path="/api/movies",
     *     summary="Store a newly created movie in storage",
     *     tags={"Movies"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Movie data to create a new entry",
     *         @OA\JsonContent(ref="#/components/schemas/MovieStoreRequest")
     *     ),
     *      @OA\Response(
     *          response=201,
     *          description="Movie created successfully",
     *          @OA\JsonContent(ref="#/components/schemas/MovieResource")
     *      ),
     *     @OA\Response(response="422", description="Incorrect data entry"),
     * )
     */
    public function store(MovieStoreRequest $request): JsonResponse
    {
        $movie = $this->movieRepository->create($request->validated());

        return response()->json(
            MovieResource::make($movie),
            Response::HTTP_CREATED
        );
    }

    /**
     * @OA\Get(
     *     path="/api/movies/{id}",
     *     summary="Get a single movie",
     *     tags={"Movies"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the movie",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Movie details",
     *         @OA\JsonContent(ref="#/components/schemas/MovieResource")
     *     ),
     *     @OA\Response(response=404, description="Movie not found")
     * )
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(
            MovieResource::make($this->movieRepository->findOrFail($id)),
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Put(
     *     path="/api/movies/{id}",
     *     summary="Update an existing movie",
     *     tags={"Movies"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the movie",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Movie data to update",
     *         @OA\JsonContent(ref="#/components/schemas/MovieUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Movie updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/MovieResource")
     *     ),
     *     @OA\Response(response=404, description="Movie not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(MovieUpdateRequest $request, string $id): JsonResponse
    {
        $movie = $this->movieRepository->update($id, $request->all());

        return response()->json(
            MovieResource::make($movie),
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Delete(
     *     path="/api/movies/{id}",
     *     summary="Delete a movie",
     *     tags={"Movies"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the movie",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Movie deleted successfully"
     *     ),
     *     @OA\Response(response=404, description="Movie not found")
     * )
     */
    public function destroy(string $id): JsonResponse
    {
        return response()->json(
            $this->movieRepository->delete($id),
            Response::HTTP_NO_CONTENT
        );
    }
}
