<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use Illuminate\Contracts\View\View;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
        return view('posts.mostrarCarro', compact('products'));
    }

    public function search(ProductSearchRequest $request)
    {
        $search_query = $request->validated()['search'];

        $products = Product::where('name', 'like', "%$search_query%")
                            ->orWhere('category', 'like', "%$search_query%")
                            ->orwhere('description', 'like', "%$search_query%")
                            ->get();

        return view('posts.search-result')->with('products', $products);
    }

}
