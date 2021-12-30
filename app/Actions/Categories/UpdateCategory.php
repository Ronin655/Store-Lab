<?php

namespace App\Actions\Categories;

use App\Http\Requests\Categories\CategoryRequest;
use App\Models\Categories\Category;

class UpdateCategory
{
    public function update(CategoryRequest $request, Category $category): Category
    {
        $category->fill($request->validated());
        $category->save();

        return $category;
    }
}
