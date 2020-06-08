<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function showProducts(Request $request)
    {
        $cart = $request->session()->get('cart');

        if($request->input('sorting')){
            $sorting = $request->input('sorting');
            $products = Product::getProductsSortByAvailabilityAndColumn($sorting);
        }else{
            $products = Product::getProductsSortByAvailability();
        }
        if (!$products)
            return redirect('/');

        return view('products', compact('products','cart'));
    }
}
