<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function showProducts(Request $request)
    {
        if($request->input('sorting')){
            $sorting = $request->input('sorting');
            $products = Product::getProductsSortByAvailabilityAndSorting($sorting);
        }else{
            $products = Product::getProductsSortByAvailability();
        }

        return view('products', compact('products'));
    }
}
