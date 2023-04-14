<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{

    public function store(ProductRequest $request){
        $responded = Route::dispatch( Request::create("api/store-product", 'POST', $request->all()) );
        if ($responded->status() == 200 ) {
            flash()->addSuccess('Product added Successfully!😃');
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Product couldn\'t be added 😞');
    }
    
}
