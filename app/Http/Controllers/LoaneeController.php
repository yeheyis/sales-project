<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoaneeRequest;
use App\Http\Requests\UpdateLoaneeRequest;
use App\Models\Loan;
use App\Models\Loanee;
use App\Models\LoanPaidAmount;
use App\Models\Product;
use Illuminate\Http\Request;

class LoaneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanees = Loanee::all();
        return view('loans.index', compact('loanees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'borrower_name' => 'required|string|max:255|unique:loanees,borrower_name',
        ]);

        Loanee::create($validated);

        return redirect()->route('loans.index')->with('success', 'Loanee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loanee $loanee)
    {
        $products = Product::all();
        $loans = Loan::all();
        $paidAmounts = LoanPaidAmount::all();
        return view('loans.show', compact('loanee', 'products', 'loans', 'paidAmounts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loanee $loanee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoaneeRequest $request, Loanee $loanee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loanee $loanee)
    {
        //
    }
}
