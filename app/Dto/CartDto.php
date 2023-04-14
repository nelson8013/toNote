<?php

namespace App\Dto;

/**
 * Class CartDto
 *
 * Data transfer object for cart information.
 */
class CartDto {
  
   public int    $user_id;
   public int    $product_id;
   public int    $quantity;
   public int    $total;

   /**
    * ProductDto constructor.
    *
    * @param int $user_id The Logged In user saving the Cart.
    * @param int $product_id The Product Id of the product.
    * @param int $quantity The quantity of the product.
    * @param int $total value of the Cart.
    */
   public function __construct(int $user_id, int $product_id, int $quantity, int $total){
      $this->user_id     = $user_id;
      $this->product_id  = $product_id;
      $this->quantity    = $quantity;
      $this->total       = $total;
   }
}
