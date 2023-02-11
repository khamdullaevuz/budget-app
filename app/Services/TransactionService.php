<?php

namespace App\Services;

use App\Events\TransactionCreated;
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
}
