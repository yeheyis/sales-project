<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanPaidAmount;

class LoanPaidAmountController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'loanee_id' => 'required|exists:loanees,id',
            'amount_paid' => 'required|numeric|min:0',
        ]);

        LoanPaidAmount::create($validated);

        return redirect()->back()->with('success', 'Payment recorded successfully.');
    }
}
