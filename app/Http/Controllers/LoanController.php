<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Loanee;
use App\Models\LoanPaidAmount;
use App\Models\Product;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        $loanees = Loanee::all();

        return view('loans.index', compact('loans', 'loanees'));
    }

    public function create()
    {
        $products = Product::all();
        return view('loans.create', compact('products'));
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'product_id' => 'required|string|max:255',
            'loanee_id' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);


        if($validated['quantity'] > Product::find($validated['product_id'])->stock) {
            return redirect()->back()->with('error', 'Not enough stock available');
        }else{

            Loan::create($validated);
            $product = Product::find($validated['product_id']);
            $product->decrement('stock', $validated['quantity']);
            return redirect()->route('loanee.show', $validated['loanee_id'])->with('success', 'Loan created successfully.');
        }


    }
}
