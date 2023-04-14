<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Services\CartService;
use App\Dto\CartDto;

class CartController extends Controller
{
    
    private CartService $cartService; 
        
    /**
     *
     * I am Injecting the Cart Service into the constructor 
     * of the CartController class.
     *
     * @param CartService $cartService is an instance of the CartService class.
     *
     * @return void
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add_to_cart(CartRequest $request)
    {
        $cartDto = new CartDto($request->user_id, $request->product_id, $request->quantity, $request->total);
        $cart    = $this->cartService->add_to_cart($cartDto);
        return response()->json($cart);
    }
}
