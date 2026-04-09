<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sale-table extends Component
{
    /**
     * Create a new component instance.
     */
     
     public $product_id;
     public $quantity;
     public $price;
     public $payment_type;
    public function __construct($product_id, $quantity, $price, $payment_type)
    {
        $this product_id = $product_id;
        $this quantity = $quantity;
        $this price = $price;
        $this payment_type = $payment_type;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sale-table');
    }
}
