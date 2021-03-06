<?php

namespace App\Services;

use App\Http\Requests\Products\ProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Products\Product;
use Illuminate\Support\Arr;

class ProductService
{
    public function create(ProductRequest $request): Product
    {
        $product = new Product();

        $product->fill(Arr::except($request->validated(), ['category_id', 'brand_id']));

        $product->category()->associate($request->get('category_id'));
        $product->brand()->associate($request->get('brand_id'));

        $product->save();

        return $product;
    }

    public function update(UpdateProductRequest $request, Product $product): Product
    {
        $data = array_filter(Arr::except($request->validated(), ['category_id', 'brand_id']));
        $product->fill($data);
        if ($request->has('category_id')) {
            $product->category()->associate($request->get('category_id'));
        }

        if ($request->has('brand_id')) {
            $product->brand()->associate($request->get('brand_id'));
        }
        $product->save();

        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
