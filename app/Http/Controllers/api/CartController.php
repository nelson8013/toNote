<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Services\CartService;
use App\Dto\CartDto;


 /**
 * @api {post} /cart/add-cart Add to Cart
 * @apiName AddToCart
 * @apiGroup Cart
 *
 * @apiDescription
 * API endpoints for managing cart related activities.
 * Add to Cart, Edit Cart, and Delete Cart
 *
 * @apiParam {Number} user_id The ID of the user adding the item to cart.
 * @apiParam {Number} product_id The ID of the product being added to cart.
 * @apiParam {Number} quantity The quantity of the product being added to cart.
 * @apiParam {Number} total The total price of the cart after adding the item.
 *
 * @apiSuccess {Object} cart The updated cart object.
 * @apiSuccessExample {json} Success-Response:
 *       {
 *       "headers": {},
 *       "original": {
 *           "message": "success",
 *           "cart": {
 *           "user_id": 1,
 *           "product_id": 2,
 *           "quantity": 1,
 *           "total": 495,
 *           "updated_at": "2023-04-14T06:37:13.000000Z",
 *           "created_at": "2023-04-14T06:37:13.000000Z",
 *           "id": 97
 *           }
 *       },
 *       "exception": null
 *       }
 * */

class CartController extends Controller
{
    
    private CartService $cartService; 
        
    /**
     * Create a new CartController instance.
     *
     * @param CartService $cartService An instance of the CartService class.
    */

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * 
     * This is the method that receives the cart request
     * and dispatches it to the CartService through the CartDto.
     * In the method the following params are expected by the CartDTO calss 
     *
     * @param int $user_id The Logged In user saving the Cart.
     * @param int $product_id The Product Id of the product.
     * @param int $quantity The quantity of the product.
     * @param int $total value of the Cart.
     * 
     * @param CartRequest $request is an instance of the CartRequest class.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function add_to_cart(CartRequest $request)
    {
        $cartDto = new CartDto($request->user_id, $request->product_id, $request->quantity, $request->total);
        $cart    = $this->cartService->add_to_cart($cartDto);

        if ($cart) {
            return response()->json($cart, 200);
        } else {
            return response()->json(['message' => 'Failed to add item to cart.'], 400);
        }
    }
}
