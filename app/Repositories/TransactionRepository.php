<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Transaction;

class TransactionRepository
{

    public function getAll()
    {
        return Transaction::paginate(10);
    }

    public function getCategoriesAll()
    {
        return Category::all();
    }

    public function create($data)
    {
        $data['user_id'] = auth()->user()->id;
        return Transaction::create($data);
    }
}
