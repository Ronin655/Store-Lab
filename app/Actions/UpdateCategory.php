<?php

namespace App\Actions;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class UpdateCategory
{
    public function update(CategoryRequest $request, Category $category): Category
    {
        $category->fill($request->validated());
        $category->save();

        return $category;
    }
}
