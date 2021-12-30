<?php

namespace App\Actions\Categories;

use App\Http\Requests\Categories\CategoryRequest;
use App\Models\Categories\Category;

class StoreCategory
{
    public function store(CategoryRequest $request)
    {
        return Category::create(['name'=>$request->get('name')]);
    }
}
