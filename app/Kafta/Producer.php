<?php

namespace App\Kafta;

use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;
use Junges\Kafka\Producers\MessageBatch;

class Producer {

   public function messageToKaftaTopicOnAddToCart($user_id,$product_id){

    return Kafka::publishOn('cart_items')->withHeaders(['user_id' => $user_id])->withBody(['product_id' => $product_id])->send();
  }



  public function messageToKaftaTopicOnCheckout($user_id,$product_id){
      $message = new Message(
        headers: [],
        body: [
            'user_id'    => $user_id,
            'product_id' => $product_id,
          ],
          key: 'checkout'
      );

      $messageBatch = new MessageBatch();
      $messageBatch->push($message);

      $producer = Kafka::publishOn('checkout') ->withConfigOptions(['user_id' => $user_id]);
      $producer->sendBatch($messageBatch);
  }
}