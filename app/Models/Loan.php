<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'loanee_id',
        'quantity',
        'price',
        'loan_date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($loan) {

        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function loanee()
    {
        return $this->belongsTo(Loanee::class);
    }
}
