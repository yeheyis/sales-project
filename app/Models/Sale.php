<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;
    
    protected $fillable = [
      'product_id',
      'quantity',
      'price',
      'payment_type',
      ];
    public function product(){
      return $this->belongsTo(Product::class);
    }
}
