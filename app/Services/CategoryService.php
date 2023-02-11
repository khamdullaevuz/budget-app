<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->getAll();
    }

    public function store($data)
    {
        return $this->repository->create($data);
    }

    public function destroy(int $id)
    {
        return $this->repository->delete($id);
    }

    public function find(int $id)
    {
        return $this->repository->findById($id);
    }

    public function update(array $validated, int $id)
    {
        return $this->repository->update($validated, $id);
    }
}
