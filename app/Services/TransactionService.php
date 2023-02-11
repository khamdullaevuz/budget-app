<?php

namespace App\Services;

use App\Events\TransactionCreated;
use App\Events\TransactionDeleted;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;

class TransactionService
{
    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->getAll();
    }

    public function getCategories()
    {
        return $this->repository->getCategoriesAll();
    }

    public function store(array $validated)
    {
        $transaction = $this->repository->create($validated);
        TransactionCreated::dispatch($transaction);
    }

    public function destroy(int $id)
    {
        $transaction = $this->repository->getById($id);
        $this->repository->delete($id);
        TransactionDeleted::dispatch($transaction);
    }
}
