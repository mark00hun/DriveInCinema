<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Screening;
use Illuminate\Database\Eloquent\Collection;

class ScreeningRepository implements RepositoryInterface
{
    protected Screening $screening;

    public function __construct(Screening $screening)
    {
        $this->screening = $screening;
    }

    public function all(): Collection
    {
        return $this->screening->all();
    }

    public function findOrFail(int $id): Screening
    {
        return $this->screening->findOrFail($id);
    }

    public function create(array $data): Screening
    {
        return $this->screening->create($data);
    }

    public function update(int $id, array $data): Screening
    {
        $screening = $this->findOrFail($id);
        $screening->update($data);

        return $screening;
    }

    public function delete(int $id): ?bool
    {
        return $this->findOrFail($id)->delete();
    }
}
