<?php

namespace App\Kafta;

use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;
use App\Kafta\Producer;
use App\Models\Cart;
use App\Dto\CartDTO;

class Consumer {

  /**
    * This is the  method responsible for listening to the "cart_items" topic and persisting the cart items in the Cart table
    * 
    * @param CartDTO $cartDTO is an instance of the CartDTO class.
    *
    * @return \Illuminate\Http\JsonResponse
  */

  public function listenToCartItemsAndStoreInCartTable(CartDTO $cartDTO) : \Illuminate\Http\JsonRespons
  {
   try {

          Kafka::createConsumer()->topic('cart_items')->handle(function ($message) {
              $userId = 1;
              $productId = $message->body['product_id'];

              $cart               = new cart;
              $cart->user_id      = 1;
              $cart->product_id   = $cartDTO->product_id;
              $cart->quantity     = $cartDTO->quantity;
              $cart->total        = $cartDTO->total;
              $cart->save();
          });

        return response()->json([ 'message' => 'success','cart' => $cart ],200);

      }catch (\Exception $e) {
          report($e);
          report($e->getMessage());
      } catch (\Throwable $e) {
          report($e->getMessage());
      }

  }

  public function listenToCheckoutAndStoreInOrderTable($request)
  {
      Kafka::createConsumer()->topic('checkout')->handle(function ($message) {
              $orders = $request->json()->all();
              $savedOrders = [];

              foreach($orders as $item){
               $userId     = 1;
               $productIds = $message->body['product_id'];

               Orders::create([
                   'user_id'        => $userId ,
                   'product_id'     => $item['product_id'],
                   'order_quantity' => $item['order_quantity'],
                   'order_price'    => $item['order_price'],
                   'total'          => $item['total']
               ]);

               (new Producer())->messageToKaftaTopicOnCheckout( 1, $item['product_id']);
   
               array_push($savedOrders, $item);
           } 
   
       });

       return response()->json([
         'message' => 'Orders created successfully',
         'orders'    => $savedOrders
       ]);
  }


 
}