<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use App\Dto\ProductDto;

class ProductController extends Controller
{
    
    private ProductService $productService; 

    /**
     *
     * I am Injecting the Product Service into the constructor 
     * of this class.
     *
     * @param ProductService $productService is an instance of the ProductService class.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store_product(ProductRequest $request)
    {
        $productDto = new ProductDto($request->name, $request->image, $request->description, $request->quantity, $request->price);
        $product    = $this->productService->store_product($productDto);
        return response()->json($product);
    }

}
