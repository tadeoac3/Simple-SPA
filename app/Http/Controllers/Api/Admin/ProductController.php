<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    protected $productService;
    
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->index();
        return new ProductResource($products);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $product = $this->productService->store($data);
        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = $this->productService->update($data, $id);
        return new ProductResource($product);
    }

    public function delete($id)
    {
        $product = $this->productService->destroy($id);
        return $product;
    }

}