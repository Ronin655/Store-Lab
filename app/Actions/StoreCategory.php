<?php

namespace App\Actions;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class StoreCategory
{
    public function store(CategoryRequest $request)
    {
        return Category::create(['name'=>$request->get('name')]);
    }
}
