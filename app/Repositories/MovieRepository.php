<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository implements RepositoryInterface
{
    private Movie $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function all(): Collection
    {
        return $this->movie->all();
    }

    public function findOrFail(int $id): Movie
    {
        return $this->movie->findOrFail($id);
    }

    public function create(array $data): Movie
    {
        return $this->movie->create($data);
    }

    public function update(int $id, array $data): Movie
    {
        $movie = $this->findOrFail($id);
        $movie->update($data);

        return $movie;
    }

    public function delete(int $id): ?bool
    {
        return $this->findOrFail($id)->delete();
    }
}
