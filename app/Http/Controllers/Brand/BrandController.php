<?php

namespace App\Http\Controllers\Brand;

use App\Http\Requests\Brands\BrandRequest;
use App\Http\Resources\Brands\BrandCollectionResource;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brands\Brand;
use App\Services\BrandService;
use http\Env\Response;

class BrandController
{
    public BrandService $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(): BrandCollectionResource
    {
        $brands = Brand::query()
            ->with('products')
            ->get();

        return new BrandCollectionResource($brands);
    }

    public function store(BrandRequest $request):BrandResource
    {
        $brand = $this->brandService->store($request);

        return new BrandResource($brand);
    }

    public function update(BrandRequest $request, Brand $brand):BrandResource
    {
        $brand = $this->brandService->update($request, $brand);

        return new BrandResource($brand);
    }

    public function destroy(Brand $brand): \Illuminate\Http\Response
    {
        $this->brandService->delete($brand);

        return response()->noContent();
    }
}