<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductService 
{

    public function index()
    {
        return Product::all();
    }
    
    public function find($id)
    {
        return Product::find($id);
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        $product = Product::find($id);
        $product->fill($data);
        $product->save();
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'success' => 'El producto ha sido eliminado'
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $product->is_cart = true;
        $product->save();
        return $product;
    }

    public function removeFromCart($id)
    {
        $product = Product::find($id);
        $product->is_cart = false;
        $product->save();
        return $product;
    }

    public function getProductsInCart()
    {
        return Product::inCart()->get();
    }

    public function removeAndUpdateproducts($id)
    {
        $product = Product::find($id);
        $product->is_cart = false;
        $product->save();
        return Product::inCart()->get();
    }

}