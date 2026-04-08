<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Product extends Model
{
    protected $fillable = [
      'code',
      'quantity',
      'category',
      'price',
      'img_path'
      ];
      
    public function sales(){
      return $this->hasMany(Sale::class);
    }
}
