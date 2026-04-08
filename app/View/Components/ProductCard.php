<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     */
     public $code;
     public $quantity;
     public $price;
     public $image;
     public $product;
     
    public function __construct($code, $quantity, $price, $image, $product)
    {
        $this->code = $code;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->price = $price;
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
