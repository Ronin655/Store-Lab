<?php

namespace App\Services;

use App\Http\Requests\Categories\CategoryRequest;
use App\Models\Categories\Category;

class CategoryService
{
    public function update(CategoryRequest $request, Category $category): Category
    {
        $category->fill($request->validated());
        $category->save();

        return $category;
    }

    public function store(CategoryRequest $request)
    {
        return Category::create(['name'=>$request->get('name')]);
    }

    public function delete(Category $category)
    {
        $category->delete();
    }
}