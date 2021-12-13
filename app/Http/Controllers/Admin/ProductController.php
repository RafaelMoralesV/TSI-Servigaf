<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreProductsRequest;
use App\Http\Requests\admin\UpdateProductRequest;
use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::with('category')
            ->orderBy('is_featured', 'desc')
            ->orderBy('updated_at', 'desc')
            ->orderBy('stock', 'desc')
            ->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductsRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductsRequest $request): RedirectResponse
    {
        $product = (new Product())->fill($request->validated());
        if ($image = $request->file('image')) {
            $path = $image->store('public/images/products');
            $product->img_path = str_replace('public', 'storage', $path);
        }

        if ($category = Category::where('id', $request['category'])->first()) {
            $product->category_id = $category->id;
        } else if ($request['category'] == "no_category") {
            $product->category_id = null;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $groups = CategoryGroup::with('categories')->get();
        return view('admin.products.edit', compact('product', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        // Esto me parece tonto, pero no puedo encontrar una mejor solucion.
        if ($image = $request->file('image')) {
            $path = $image->store('public/images/products');
            $product->img_path = str_replace('public', 'storage', $path);
        }

        if ($category = Category::where('id', $request['category'])->first()) {
            $product->category_id = $category->id;
        } else if ($request['category'] == "no_category") {
            $product->category_id = null;
        }

        $product->fill($request->validated());
        $product->save();

        return redirect()->route('products.index')
            ->with('message', __('El producto ha sido actualizado exitosamente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
