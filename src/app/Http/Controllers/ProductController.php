<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepository = $productRepo;        
    }

    public function list()
    {
        $products = $this->productRepository->getPaginate();

        return response()->json(new ProductCollection($products));
    }

    public function create(ProductRequest $request)
    {
        $data = $request->only([
            'user_id',
            'name',
            'description',
            'price',
        ]);

        $product = $this->productRepository->create($data);

        return response()->json(new ProductResource($product));
    }

    public function detail($id) 
    {
        $product = $this->productRepository->find($id);

        return response()->json(new ProductResource($product));
    }

    public function edit(ProductRequest $request, $id)
    {
        $data = $request->only([
            'user_id',
            'name',
            'description',
            'price',
        ]);

        $product = $this->productRepository->update($id, $data);

        return response()->json(new ProductResource($product));
    }

    public function delete($id)
    {
        $product = $this->productRepository->delete($id);

        if (!$product) {
            return response()->json(['error' => 'No Content'], 204);
        }
    }
}
