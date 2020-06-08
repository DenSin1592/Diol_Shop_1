<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Cart;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addOrDeleteFromCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart')? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addOrDeleteProducts($product, $product->id);

        $request->session()->put('cart', $cart);

        $data['success'] = true;
        echo json_encode($data);
    }
}
