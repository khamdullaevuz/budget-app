<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Transaction;

class TransactionRepository
{

    public function getAll()
    {
        return Transaction::orderByDesc('created_at')->paginate(10);
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

    public function getById(int $id)
    {
        return Transaction::find($id);
    }

    public function delete(int $id)
    {
        return Transaction::destroy($id);
    }
}
