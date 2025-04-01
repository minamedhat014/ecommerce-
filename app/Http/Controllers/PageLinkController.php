<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageLinkController extends Controller
{
    public function showProduct($slug)
    {
       $product = Product::where('slug', $slug)->first();
       if (!$product) {
        abort(404);
        }
        return view('ecommerce.pages.products', compact('product'));
    }
}
