<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kafta\Consumer;
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
     */
    public function checkout(Request $request){
        
        $consumer =  new Consumer();
        $consumer->listenToCheckoutAndStoreInOrderTable($request);
    }

}
