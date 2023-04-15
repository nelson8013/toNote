<?php

namespace App\Services;

use App\Models\Cart;
use App\Dto\CartDTO;
use App\Kafta\Producer;

class CartService {

  /**
     * This is the service method responsible for persisting the cart items in the Cart table
     * 
     * @param CartDTO $cartDTO is an instance of the CartDTO class.
     *
     * @return \Illuminate\Http\JsonResponse
     */
 

  public function add_to_cart(CartDTO $cartDTO) : \Illuminate\Http\JsonResponse
  {
     try {
       $cart               = new cart;
       $cart->user_id      = $cartDTO->user_id;
       $cart->product_id   = $cartDTO->product_id;
       $cart->quantity     = $cartDTO->quantity;
       $cart->total        = $cartDTO->total;
       $cart->save();

       (new Producer())->messageToKaftaTopicOnAddToCart( 1,$cartDTO->product_id);
       
       return response()->json([ 'message' => 'success','cart' => $cart ],200);

      }catch (\Exception $e) {
          report($e);
          report($e->getMessage());
      } catch (\Throwable $e) {
          report($e->getMessage());
      }
  }

 


}
