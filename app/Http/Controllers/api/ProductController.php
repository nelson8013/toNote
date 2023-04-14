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
     * 
     * @response {
     *  "name": "iPhone 13 Pro Max",
     *   "image": "https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/V/E/172512_1634304642.jpg",
     *   "description": "This is the iPhone",
     *   "quantity": 5,
     *   "price": 1300000,
     *   "updated_at": "2023-04-14T06:09:39.000000Z",
     *   "created_at": "2023-04-14T06:09:39.000000Z",
     *   "id": 8
     *   }
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
