<?php

namespace App\Actions;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Arr;

class UpdateProduct
{
    public function update(UpdateProductRequest $request, Product $product): Product
    {
        $data = array_filter(Arr::except($request->validated(), 'category_id'));
        $product->fill($data);
        if ($request->has('category_id')) {
            $product->category()->associate($request->get('category_id'));
        }
        $product->save();

        return $product;
    }
}
