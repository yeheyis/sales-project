<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPaidAmount extends Model
{
    /** @use HasFactory<\Database\Factories\LoanPaidAmountFactory> */
    use HasFactory;

    protected $fillable = ['loanee_id', 'amount_paid'];

    public function loanee()
    {
        return $this->belongsTo(Loanee::class);
    }
}
