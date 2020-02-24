<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Http\Services\ProductService;

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

}