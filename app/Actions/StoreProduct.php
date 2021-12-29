<?php

namespace App\Actions;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Arr;

class StoreProduct
{
    public function store(ProductRequest $request): Product
    {
        /** @var Product $product */
        $product = Product::create(Arr::except($request->validated(), 'category_id'));
        $product->category()->associate($request->get('category_id'));

        return $product;
    }
}
