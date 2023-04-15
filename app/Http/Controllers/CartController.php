<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{

    public function cart($user){
        $cart  = Cart::where('user_id', 1)->get();
        $total = Cart::where('user_id', 1)->sum('total');
        return view('cart',compact('cart', 'user','total'));
    }

    public function add_to_cart(CartRequest $request){
        
        $responded = Route::dispatch( Request::create("api/add-cart", 'POST', $request->all()) );
        if ($responded->status() == 200 ) {
            return response()->json([
                'state' => 1,
                'message' => 'dis item don enta cart. Wehdone!😃',
                'cartCount' => Cart::where('user_id', $request->user_id)->count(),
            ]);
        }
        return redirect()->back()->with('error', 'We  couldn\'t add to cart 😞'); 
        
    }

    public function checkout(Request $request){
        $responded = Route::dispatch( Request::create("api/checkout-cart", 'POST', $request->all()) );
        if ($responded->status() == 200 ) {
            return response()->json([
                'message' => 'your order don set. Wehdone!😃',
            ]);
        }
    }
    

}
