<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Repositories\MovieRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->movieRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieStoreRequest $request): JsonResponse
    {
        $movie = $this->movieRepository->create($request->validated());

        return response()->json($movie, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json($this->movieRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieUpdateRequest $request, string $id): JsonResponse
    {
        $movie = $this->movieRepository->update($id, $request->all());

        return response()->json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->movieRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
