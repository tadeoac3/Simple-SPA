<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product as ProductResource;

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

    public function find(Request $request)
    {
        $product = $this->productService->find($request->id);
        return new ProductResource($product);
    }

    public function addToCart(Request $request)
    {
        $product = $this->productService->addToCart($request->id);
        return new ProductResource($product);
    }

    public function removeFromCart(Request $request)
    {
        $product = $this->productService->removeFromCart($request->id);
        return new ProductResource($product);
    }

    public function getProductsInCart()
    {
        $products = $this->productService->getProductsInCart();
        return new ProductResource($products);
    }

    public function removeAndUpdateProducts(Request $request)
    {
        $products = $this->productService->removeAndUpdateProducts($request->id);
        return new ProductResource($products);
    }

}
