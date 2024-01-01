<?php

namespace App\Repositories;

use App\Interfaces\EssentialRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EssentialRepository implements EssentialRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []): Collection
    {

        return $this->model->with($relations)->where('enable', 1)->get($columns);
    }

    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
    ): ?Model {
        return $this->model->select($columns)->with($relations)->where('enable', 1)->findOrFail($modelId);
    }

    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    public function deleteById(int $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }
}
