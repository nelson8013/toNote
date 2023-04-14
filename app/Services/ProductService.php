<?php

namespace App\Services;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Dto\ProductDTO;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductService {

  /**
     * This returns a collection of products through a resource transformer
     * 
   */
  public function products(){
    return ProductResource::collection( Product::all() );
  }

  /**
     * This is the service method responsible for persisting the product in the Product table
     * 
     * @param ProductDTO $productDTO is an instance of the ProductDTO class.
     *
     * @return Product
     */
  public function store_product(ProductDTO $productDTO) : Product
  {
     try {
       $product               = new Product;
       $product->name         = $productDTO->name;
       $product->image        = $productDTO->image;
       $product->description  = $productDTO->description;
       $product->quantity     = $productDTO->quantity;
       $product->price        = $productDTO->price;
       $product->save();

       return $product;
 
      }catch (\Exception $e) {
          report($e);
          report($e->getMessage());
      } catch (\Throwable $e) {
          report($e->getMessage());
      }
  }


}
