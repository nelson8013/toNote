<?php

namespace App\Dto;

/**
 * Class ProductDto
 *
 * Data transfer object for product information.
 */
class ProductDto {
  
   
   public string $name;
   public string $image;
   public string $description;
   public int    $quantity;
   public int    $price;

   /**
    * ProductDto constructor.
    *
    * @param string $name The name of the product.
    * @param string $image The Picture of the product.
    * @param string $description The description of the product.
    * @param int $quantity The quantity of the product.
    * @param int $price The price of the product.
    */
   public function __construct(string $name, string $image, string $description, int $quantity, int $price){
      $this->name        = $name;
      $this->image       = $image;
      $this->description = $description;
      $this->quantity    = $quantity;
      $this->price       = $price;
   }
}
