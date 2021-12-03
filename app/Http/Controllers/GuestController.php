<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $featured_products = Product::where('is_featured', '1') ->take(8)->get();
        return view('posts.index', compact('featured_products'));
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('posts.show', compact('product'));
    }

    public function show_cart(): View
    {
        $products = Cart::content();
        $total = Cart::subtotal(0);
        return view('posts.mostrarCarro', compact('products', 'total'));
    }
}
