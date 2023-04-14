<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;


/**
 * @Order Management
 *
 * API endpoints for managing Orders.
 * It adds the orders to the orders table.
 */
class OrderController extends Controller
{
     /**
     * Checkout Method responsible for dispatching the order.
     * @param Request $request is an instance of the Illuminate\Http\Request class.
     *
     * @return void
     * 
     * @response {
     *       "message": "Orders created successfully",
     *       "orders": [
     *           {
     *           "user_id": 1,
     *           "product_id": 2,
     *           "order_quantity": 1,
     *           "order_price": 495,
     *           "total": 495
     *           },
     *           {
     *           "user_id": 1,
     *           "product_id": 2,
     *           "order_quantity": 1,
     *           "order_price": 495,
     *           "total": 495
     *           }
     *       ]
     *   }
     * 
     */
    public function checkout(Request $request){
        $orders = $request->json()->all();
        $savedOrders = [];

        foreach($orders as $item){
            Orders::create([
                'user_id'        => $item['user_id'],
                'product_id'     => $item['product_id'],
                'order_quantity' => $item['order_quantity'],
                'order_price'    => $item['order_price'],
                'total'          => $item['total']
            ]);
            array_push($savedOrders, $item);
        } 

        return response()->json([
            'message' => 'Orders created successfully',
            'orders'    => $savedOrders
        ]);
        
    }

}
