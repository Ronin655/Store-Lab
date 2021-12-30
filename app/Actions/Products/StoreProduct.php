<?php

namespace App\Actions\Products;

use App\Http\Requests\Products\ProductRequest;
use App\Models\Products\Product;
use Illuminate\Support\Arr;

class StoreProduct
{
    public function store(ProductRequest $request): Product
    {
        $product = new Product();
        $product->fill(Arr::except($request->validated(), 'category_id'));
        $product->category()->associate($request->get('category_id'));
        $product->save();

        return $product;
    }
}
