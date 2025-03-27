<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScreeningStoreRequest;
use App\Http\Requests\ScreeningUpdateRequest;
use App\Http\Resources\ScreeningResource;
use App\Repositories\ScreeningRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Tag(
 *     name="Screenings",
 *     description="Endpoints for managing movie screenings"
 * )
 */
class ScreeningController extends Controller
{
    private ScreeningRepository $screeningRepository;

    public function __construct(ScreeningRepository $screeningRepository)
    {
        $this->screeningRepository = $screeningRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/screenings",
     *     summary="Get all screenings",
     *     tags={"Screenings"},
     *     @OA\Response(
     *         response=200,
     *         description="List of screenings",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ScreeningResource"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(
            ScreeningResource::collection($this->screeningRepository->all()),
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Post(
     *     path="/api/screenings",
     *     summary="Create a new screening",
     *     tags={"Screenings"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ScreeningStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Screening created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/ScreeningResource")
     *     ),
     *     @OA\Response(response="422", description="Incorrect data entry"),
     * )
     */
    public function store(ScreeningStoreRequest $request): JsonResponse
    {
        $screening = $this->screeningRepository->create($request->validated());

        return response()->json(
            ScreeningResource::make($screening),
            Response::HTTP_CREATED
        );
    }

    /**
     * @OA\Get(
     *     path="/api/screenings/{id}",
     *     summary="Get a specific screening",
     *     tags={"Screenings"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the screening",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Screening details",
     *         @OA\JsonContent(ref="#/components/schemas/ScreeningResource")
     *     ),
     *     @OA\Response(response=404, description="Screening not found")
     * )
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(
            ScreeningResource::make($this->screeningRepository->findOrFail($id)),
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Put(
     *     path="/api/screenings/{id}",
     *     summary="Update an existing screening",
     *     tags={"Screenings"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the screening",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Screening data to update",
     *         @OA\JsonContent(ref="#/components/schemas/ScreeningUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Screening updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/ScreeningResource")
     *     ),
     *     @OA\Response(response=404, description="Screening not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(ScreeningUpdateRequest $request, string $id): JsonResponse
    {
        $screening = $this->screeningRepository->update($id, $request->validated());

        return response()->json(
            ScreeningResource::make($screening),
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Delete(
     *     path="/api/screenings/{id}",
     *     summary="Delete a screening",
     *     tags={"Screenings"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the screening",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Screening deleted successfully"
     *     ),
     *     @OA\Response(response=404, description="Screening not found")
     * )
     */
    public function destroy(string $id): JsonResponse
    {
        return response()->json(
            $this->screeningRepository->delete($id),
            Response::HTTP_NO_CONTENT
        );
    }
}
