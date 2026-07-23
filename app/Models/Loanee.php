<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loanee extends Model
{
    /** @use HasFactory<\Database\Factories\LoaneeFactory> */
    use HasFactory;

    protected $fillable = [
        'borrower_name',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function loanPaidAmounts()
    {
        return $this->hasMany(LoanPaidAmount::class);
    }
}
