<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(){
      $sales = Sale::all();
      
      return view('sales.index', compact('sales'));
    }
    
    public function create () {
      
      return view('sales.create');
    }
    
    public function store(Request $request){
      
      $validated = $request->validate([
          'product_id' => 'required | string | max:255',
          'quantity' => 'required | integer',
          'price' => 'required | numeric',
          'payment_type'  => 'required',
          ]);
          
          Sale::create($validated);
          return redirect()->route('sales.index')->with('success', 'Added successfully');
    }
}
