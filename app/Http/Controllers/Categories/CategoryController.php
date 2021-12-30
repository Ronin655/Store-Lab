<?php

namespace App\Http\Controllers\Categories;

use App\Http\Requests\Categories\CategoryRequest;
use App\Http\Resources\Categories\CategoryCollectionResource;
use App\Http\Resources\Categories\CategoryResource;
use App\Models\Categories\Category;
use App\Services\CategoryService;
use Illuminate\Http\Response;
use function response;

class CategoryController
{
    public CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): CategoryCollectionResource
    {
        $categories = Category::query()
            ->with('products')
            ->get();

        return new CategoryCollectionResource($categories);
    }

    public function store(CategoryRequest $request): CategoryResource
    {
        $category = $this->categoryService->store($request);

        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, Category $category): CategoryResource
    {
        $category = $this->categoryService->update($request, $category);

        return new CategoryResource($category->load('products'));
    }

    public function destroy(Category $category): Response
    {
        $this->categoryService->delete($category);

        return response()->noContent();
    }
}
