<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
class OrderController extends Controller
{
    //

    public function checkout(Request $request){
        $orders = $request->json()->all();
        // $orders = $data['data'];

        foreach($orders as $item){
            Orders::create([
                'user_id'        => $item['user_id'],
                'product_id'     => $item['product_id'],
                'order_quantity' => $item['order_quantity'],
                'order_price'    => $item['order_price'],
                'total'          => $item['total']
            ]);
        } 

        
    }

}
