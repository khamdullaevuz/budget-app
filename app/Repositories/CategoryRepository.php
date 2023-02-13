<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{

    public function getAll()
    {
        return Category::paginate(10);
    }

    public function create($data)
    {
        $data['user_id'] = auth()->user()->id;
        return Category::create($data);
    }

    public function delete(int $id)
    {
        return Category::destroy($id);
    }

    public function findById(int $id)
    {
        return Category::find($id);
    }

    public function update(array $validated, int $id)
    {
        $category = $this->findById($id);
        $category->update($validated);
        return $category;
    }

    public function categorySearch($type)
    {
        return Category::where('type', $type)->get();
    }
}
