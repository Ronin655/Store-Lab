<?php

namespace App\Http\Controllers;

use App\Actions\StoreCategory;
use App\Actions\UpdateCategory;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryCollectionResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController
{
    public function index(): CategoryCollectionResource
    {
        $categories = Category::query()
            ->with('products')
            ->get();

        return new CategoryCollectionResource($categories);
    }

    public function store(CategoryRequest $request): CategoryResource
    {
        $category = (new StoreCategory())->store($request);

        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, Category $category): CategoryResource
    {
        $category = (new UpdateCategory())->update($request, $category);

        return new CategoryResource($category->load('products'));
    }

    public function destroy(Category $category): Response
    {
        $category->delete();

        return response()->noContent();
    }
}
