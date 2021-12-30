<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Products\ProductCollectionResource;
use App\Http\Resources\Products\ProductResource;
use App\Models\Products\Product;
use App\Services\ProductService;
use Illuminate\Http\Response;
use function response;

class ProductController extends Controller
{
    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): ProductCollectionResource
    {
        $products = Product::query()
            ->with('category')
            ->get();

        return new ProductCollectionResource($products);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product->load('category'));
    }

    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productService->create($request);

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        $product = $this->productService->update($request, $product);

        return new ProductResource($product->load('category'));
    }

    public function destroy(Product $product): Response
    {
        $this->productService->delete($product);

        return response()->noContent();
    }
}
