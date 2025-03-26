<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScreeningStoreRequest;
use App\Http\Requests\ScreeningUpdateRequest;
use App\Repositories\ScreeningRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ScreeningController extends Controller
{
    private ScreeningRepository $screeningRepository;

    public function __construct(ScreeningRepository $screeningRepository)
    {
        $this->screeningRepository = $screeningRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->screeningRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScreeningStoreRequest $request): JsonResponse
    {
        $screening = $this->screeningRepository->create($request->validated());

        return response()->json($screening, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json($this->screeningRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScreeningUpdateRequest $request, string $id): JsonResponse
    {
        $screening = $this->screeningRepository->update($id, $request->validated());

        return response()->json($screening);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->screeningRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
