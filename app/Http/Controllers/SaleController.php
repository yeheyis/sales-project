<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){
      $sales = Sale::all();

      return view('sales.index', compact('sales'));
    }

    public function create (Product $product) {

      return view('sales.create', compact('product'));
    }

    public function store(Request $request){

      $validated = $request->validate([
          'product_id' => 'required | string | max:255',
          'quantity' => 'required | integer',
          'price' => 'required | numeric',
          'payment_type'  => 'required',
          ]);

          Sale::create($validated);
          return redirect()->route('products.index')->with('success', 'Added successfully');
    }

    public function show(Sale $sale){
      return view('sales.show', compact('sale'));
    }
}
