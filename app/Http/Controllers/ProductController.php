<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $products = Product::query();

        if ($request->has('category')) {
            if(request('category') === 'both'){
                $products->whereIn('category', ['male', 'female']);
            } else{

                $products->where('category', $request->category);
            }

        }

        $products = $products->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
          'code' => 'required | string | max:255',
          'quantity' => 'required | integer',
          'category'  => 'required',
          'price' => 'required | numeric',
          'img_path' => 'required|image|mimes:jpeg,png,jpg',
          ]);

        $imgPath = $request->file('img_path')->store('products', 'public');

        $validated['img_path'] = $imgPath;

        // dd($validated);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', [
          'product' => $product
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate(
          [
          'code' => 'required | string | max:255',
          'quantity' => 'required | integer',
          'category'  => 'required',
          'price' => 'required | numeric',
          'img_path' => 'required|image|max:5120',
          ]
          );

          Storage::disk('public')->delete($product->img_path);
          $path = $request->file('img_path')->store('products', 'public');
          $validated['img_path'] = $path;
          $product->update($validated);

          return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->img_path) {
        Storage::disk('public')->delete($product->img_path);

        $product->delete();

        return redirect()->route('products.index')
                     ->with('success', 'Product deleted successfully!');
    }
    }
}
