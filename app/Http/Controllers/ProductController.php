<?php

namespace App\Http\Controllers;

use App\Actions\StoreProduct;
use App\Actions\UpdateProduct;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollectionResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use \Illuminate\Http\Response;

class ProductController extends Controller
{
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
        $product = (new StoreProduct())->store($request);

        return new ProductResource($product);

    }

    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        $product = (new UpdateProduct())->update($request, $product);

        return new ProductResource($product->load('category'));
    }

    public function destroy(Product $product): Response
    {
        $product->delete();

        return response()->noContent();
    }
}
