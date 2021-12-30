<?php

namespace App\Services;

use App\Http\Requests\Brands\BrandRequest;
use App\Models\Brands\Brand;

class BrandService
{
    public function update(BrandRequest $request, Brand $brand): Brand
    {
        $brand->fill($request->validated());
        $brand->save();

        return $brand;
    }

    public function store(BrandRequest $request)
    {
        return Brand::create(['name' => $request->get('name')]);
    }

    public function delete(Brand $brand)
    {
        $brand->delete();
    }
}